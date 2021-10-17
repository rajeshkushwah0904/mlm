<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User;
use Illuminate\Support\Facades\Auth; 
use Session;
use Validator;
use Illuminate\Support\Facades\Hash;
use Cookie;
use Illuminate\Support\Facades\Response;


class DistributorController extends Controller
{
    
   public function register(Request $request) { 
        
       $sponsor_tracking_id = $request->sponsor_tracking_id;
        return view('distributors.register',compact('sponsor_tracking_id'));
    }
    
  
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */


     
     
    public function register_send_otp(Request $request) { 
        $username="Rightwayfuture";
$password="Benchmark@123";
$sender="RWFTPL";

//---------------------------------

    $distributor_name=$request->mobile;
	$mobile=$request->mobile;
    $otp = rand(100000,999999);
    $minutes = 60;
    $cookie = cookie('otp_mobile', $mobile.",".$otp, $minutes);
	$message="Dear ".$distributor_name.", ".$otp." is the OTP for your login at Rightway Future. In case you have not requested this, please contact us at info@rightwayfuture.com Rightway Future";
	$username=urlencode($username);
	$password=urlencode($password);
	$sender=urlencode($sender);
	$message=urlencode($message);

	$parameters="username=".$username."&password=".$password."&mobile=".$mobile."&sendername=".$sender."&message=".$message."&templateid=1707163395171735226";

	$url="http://priority.muzztech.in/sms_api/sendsms.php";

	$ch = curl_init($url);

	if(isset($_POST))
	{
        curl_setopt($ch, CURLOPT_POST,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
	}
	else
	{
		$get_url=$url."?".$parameters;
		curl_setopt($ch, CURLOPT_POST,0);
		curl_setopt($ch, CURLOPT_URL, $get_url);
	}

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
	curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
	$return_val = curl_exec($ch);
       if($mobile){
         return response()->json(['status'=>true,'message'=>'OTP Send Successfully'], 200)->cookie($cookie);
          }else{
            return response()->json(['status'=>false,'message'=>'Error Data Does Not Found. Please Try Again'], 401);                
          }



    }

    public function register_store(Request $request) {
$value = request()->cookie('otp_mobile');
$otp_mobile = explode(',',$value);
if($otp_mobile[0]==$request->mobile&&$otp_mobile[1]==$request->otp){

        $this->validate($request, [            
             'name' => 'required',
             'address' => 'required',
             'mobile' => 'required',
             'email' => 'required',
              'nominee' => 'required',
        ]);
        $random = rand(1000000,9999999);  
          $distributor = \App\Distributor::where('distributor_tracking_id','RF1'.$random)->first();
        if($distributor){
           $random = rand(1000000,9999999);   
        }
        $sponsor_distributor = \App\Distributor::where('distributor_tracking_id',$request->input('sponsor_tracking_id'))->first();

		$distributor = \App\Distributor::create([
			 'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'address'=>$request->input('address'),
            'mobile'=>$request->input('mobile'),
            'status'=>0,
            'distributor_is_paid'=>0,
            'sponsor_id'=>$sponsor_distributor->id,
            'nominee'=>$request->input('nominee'),
            'joining_date'=>date('Y-m-d H:i:s'),
            'distributor_tracking_id'=>'RF1'.$random,
               ]);              
            
                $user = \App\User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'distributor_tracking_id' => $distributor->distributor_tracking_id,
                    'distributor_id' => $distributor->id,
                    'role'=>'3',
                    'status'=>1,
                    'mobile' => $request->input('mobile'),
                    'password' => Hash::make(1234567),
            ]);

            $ditributor_level=\App\DistributorLevel::create([
            'L0'=>$distributor->id,
            'L1'=>$sponsor_distributor->id,
            'L2'=>$sponsor_distributor->sponsor_id,
            ]);
            $lever_l3 =\App\Distributor::find($sponsor_distributor->sponsor_id);
           if($lever_l3){
            $ditributor_level->L3=$lever_l3->sponsor_id;
           }
           $lever_l4 =\App\Distributor::find($lever_l3->sponsor_id);;
           if($lever_l4){
            $ditributor_level->L4=$lever_l4->sponsor_id;
           }
        $ditributor_level->save();
            $abc = Auth::login($user);

        session()->flash('success', 'New Distributor Register Successfully');
        return redirect()->route('backend.dashboard');
}else{
            session()->flash('error', 'New Package is create Successfully');
        return redirect()->back();
}
    }

       public function list(Request $request) { 
           if(\Auth::user()->role==1){
           $distributors = \App\Distributor::all();
           }else{

           $distributors = \App\Distributor::where('sponsor_tracking_id','=',\Auth::user()->distributor_tracking_id)->get();
           }
        return view('backend.distributors.list', compact('distributors'));
    }

       public function login(Request $request) { 
        return view('distributors.login');
    }

           public function login_store(Request $request) { 
            $user = \App\User::where('distributor_tracking_id','=',$request->distributor_tracking_id)->where('status', '=','1')->first();
            if($user){
            if(Hash::check($request->password, $user->password)) {
                $abc = Auth::login($user);
        session()->flash('success', 'Distributor is Login Successfully');
              return redirect()->route('backend.dashboard');
            }else{
        session()->flash('error', 'Data does not match please try Again');
                     return redirect()->back();   
            }
        }

    }


    
}