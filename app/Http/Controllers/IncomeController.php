<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
       public function direct_income(Request $request) { 
          $incomes  = \App\Income::where('income_type',1)->where('sponsor_id',\Auth::user()->distributor_id)->get();
           
        return view('backend.incomes.direct_income',compact('incomes'));
    }

    public function repurchase_income(Request $request) { 
          $incomes  = \App\Income::where('income_type',2)->where('sponsor_id',\Auth::user()->distributor_id)->get();
           
        return view('backend.incomes.repurchase_income',compact('incomes'));
    }

        public function reward_income(Request $request) { 
          $incomes  = \App\Income::where('income_type',3)->where('sponsor_id',\Auth::user()->distributor_id)->get();
           
        return view('backend.incomes.reward_income',compact('incomes'));
    }
}