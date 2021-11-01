<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function direct_income(Request $request)
    {
        $level = "";
        if ($request->level) {
            $level = $request->level;
            $incomes = \App\Income::where('level', $request->level)->where('income_type', 1)->where('sponsor_id', \Auth::user()->distributor_id)->get();
        } else {
            $incomes = \App\Income::where('income_type', 1)->where('sponsor_id', \Auth::user()->distributor_id)->get();
        }
        return view('backend.incomes.direct_income', compact('incomes', 'level'));
    }

    public function all_direct_income(Request $request)
    {
        $distributors = \App\Distributor::all();

        $sponsor_id = $request->sponsor_id;
        $level = $request->level;
        if ($sponsor_id && $level) {

            $incomes = \App\Income::where('level', $request->level)->where('income_type', 1)->where('sponsor_id', $sponsor_id)->orderBy('id', 'DESC')->get();

        } else if ($level) {
            $incomes = \App\Income::where('level', $request->level)->where('income_type', 1)->orderBy('id', 'DESC')->get();

        } else if ($sponsor_id) {
            $incomes = \App\Income::where('income_type', 1)->where('sponsor_id', $sponsor_id)->orderBy('id', 'DESC')->get();

        } else {
            $incomes = \App\Income::where('income_type', 1)->orderBy('id', 'DESC')->get();
        }
        return view('backend.incomes.all_direct_income', compact('incomes', 'level', 'sponsor_id', 'distributors'));
    }

    public function repurchase_income(Request $request)
    {
        $level = "";
        if ($request->level) {
            $level = $request->level;
            $incomes = \App\Income::where('level', $request->level)->where('income_type', 2)->where('sponsor_id', \Auth::user()->distributor_id)->get();
        } else {
            $incomes = \App\Income::where('income_type', 2)->where('sponsor_id', \Auth::user()->distributor_id)->get();
        }

        return view('backend.incomes.repurchase_income', compact('incomes', 'level'));
    }

    public function all_repurchase_income(Request $request)
    {
        $distributors = \App\Distributor::all();

        $sponsor_id = $request->sponsor_id;
        $level = $request->level;
        if ($sponsor_id && $level) {

            $incomes = \App\Income::where('level', $request->level)->where('income_type', 2)->where('sponsor_id', $sponsor_id)->orderBy('id', 'DESC')->get();

        } else if ($level) {
            $incomes = \App\Income::where('level', $request->level)->where('income_type', 2)->orderBy('id', 'DESC')->get();

        } else if ($sponsor_id) {
            $incomes = \App\Income::where('income_type', 2)->where('sponsor_id', $sponsor_id)->orderBy('id', 'DESC')->get();

        } else {
            $incomes = \App\Income::where('income_type', 2)->orderBy('id', 'DESC')->get();
        }
        return view('backend.incomes.all_repurchase_income', compact('incomes', 'level', 'sponsor_id', 'distributors'));
    }

    public function reward_income(Request $request)
    {
        $rewards = \App\Reward::all();
        return view('backend.incomes.reward_income', compact('rewards'));
    }
}