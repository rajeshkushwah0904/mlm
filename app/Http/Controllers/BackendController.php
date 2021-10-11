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
            $direct_incomes= \App\Income::where('income_type',1)->where('sponsor_id', \Auth::user()->distributor_id)->sum('sponsor_amount');
            $repuchase_incomes= \App\Income::where('income_type',2)->where('sponsor_id', \Auth::user()->distributor_id)->sum('sponsor_amount');
            $reward_incomes= \App\Income::where('income_type',3)->where('sponsor_id', \Auth::user()->distributor_id)->sum('sponsor_amount');
        return view('backend.distributor_dashboard',compact('site_route','direct_incomes','repuchase_incomes','reward_incomes'));
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