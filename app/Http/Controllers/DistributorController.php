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
    public function register_store(Request $request) {

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
            $abc = Auth::login($user);

        session()->flash('success', 'New Package is create Successfully');
        return redirect()->route('backend.dashboard');
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