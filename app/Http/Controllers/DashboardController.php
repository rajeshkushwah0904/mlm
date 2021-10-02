<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


        public function profile()
    {
        return view('backend.profile');
    }

        public function dashboard(Request $request)
    {
        $site_route = $request->getSchemeAndHttpHost();
        if(\Auth::user()->role==3){
        return view('backend.distributor_dashboard',compact('user','site_route'));
        }else if(\Auth::user()->role==1){
        return view('backend.dashboard',compact('user','site_route'));            
        }else{
        return view('backend.dashboard',compact('user','site_route'));            
        }
    }
    
}