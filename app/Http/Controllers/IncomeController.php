<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
       public function direct_income(Request $request) { 
          $incomes  = \App\Income::where('sponsor_id',\Auth::user()->distributor_id)->get();
           
        return view('backend.incomes.direct_income',compact('incomes'));
    }
}