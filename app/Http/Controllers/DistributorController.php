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
             'email' => 'required',
               'address' => 'required',
             'mobile' => 'required',
              'nominee' => 'required',
        ]);
		$distributor = \App\Distributor::create([
			 'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'address'=>$request->input('address'),
            'mobile'=>$request->input('mobile'),
            'status'=>0,
            'distributor_is_paid'=>0,
            'sponsor_tracking_id'=>$request->input('sponsor_tracking_id'),
            'nominee'=>$request->input('nominee'),
            'joining_date'=>date('Y-m-d H:i:s'),
               ]);              
            $distributor->distributor_tracking_id='RF'.$distributor->id;
            $distributor->save();
            
                $user = \App\User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'distributor_tracking_id' => 'RF'.$distributor->id,
                    'distributor_id' => $distributor->id,
                    'role'=>'3',
                    'address' => $request->input('address'),
                    'status'=>1,
                    'mobile' => $request->input('mobile'),
                    'nominee' => $request->input('nominee'),
                    'password' => 1234567,
            ]);
            $abc = Auth::login($user);

        session()->flash('success', 'New Package is create Successfully');
        return redirect()->route('backend.dashboard');
    }

       public function list(Request $request,$id) { 
           $distributors = \App\Distributor::where('sponsor_tracking_id','=','RF'.$id)->get();
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