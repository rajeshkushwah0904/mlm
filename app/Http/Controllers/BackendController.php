<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{


        public function profile()
    {
        return view('backend.profile');
    }

        public function dashboard(Request $request)
    {
        $site_route = $request->getSchemeAndHttpHost();
        if(\Auth::user()->role==3){
        return view('backend.distributor_dashboard',compact('site_route'));
        }else if(\Auth::user()->role==1){
         $packages= \App\Package::all();  
         $distributors= \App\Distributor::all();  
          $products= \App\Product::all();  
        return view('backend.dashboard',compact('packages','distributors','products'));            
        }else{
        return view('backend.dashboard',compact('packages','distributors','products'));            
        }
    }


            public function genealogy_tree(Request $request)
    {
        $site_route = $request->getSchemeAndHttpHost();
     $distributor = \App\Distributor::where('distributor_tracking_id',\Auth::user()->distributor_tracking_id)->first();
        return view('backend.genealogy_tree',compact('distributor'));            
        
    }
    
    
}