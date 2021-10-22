<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{

    public function profile(Request $request)
    {
        $site_route = $request->getSchemeAndHttpHost();
        $distributor = \App\Distributor::where('distributor_tracking_id', \Auth::user()->distributor_tracking_id)->first();
        return view('backend.profile', compact('distributor', 'site_route'));
    }

    public function profile_update(Request $request)
    {

        $site_route = $request->getSchemeAndHttpHost();
        $distributor = \App\Distributor::find($request->distributor_id);
        $distributor->address = $request->address;
        $distributor->dob = $request->dob;
        $distributor->pincode = $request->pincode;
        $distributor->gender = $request->gender;
        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            $filename = $image->getClientOriginalName();
            $fullname = 'upload/' . $filename;
            // $fullname = Str::slug(Str::random(16) . $filename) . '.' . $image->getClientOriginalExtension();
            $image->move("upload", $fullname);
            $distributor->profile_image = $fullname;
        }
        $distributor->save();
        $distributor->address = $request->address;
        $distributor->save();
        session()->flash('success', 'Distributor Profile is Update Successfully');
        return redirect()->back();
    }

    public function dashboard(Request $request)
    {
        $packages = \App\Package::all();
        $distributors = \App\Distributor::all();
        $products = \App\Product::all();
        return view('backend.dashboard', compact('packages', 'distributors', 'products'));

    }

    public function distributor_dashboard(Request $request)
    {
        $distributor = \App\Distributor::find(\Auth::user()->distributor_id);
        $site_route = $request->getSchemeAndHttpHost();
        $my_direct = \App\DistributorLevel::where('L1', \Auth::user()->distributor_id)->count();
        $total_downline = \App\DistributorLevel::where('L1', \Auth::user()->distributor_id)
            ->orWhere('L2', \Auth::user()->distributor_id)
            ->orWhere('L3', \Auth::user()->distributor_id)
            ->orWhere('L4', \Auth::user()->distributor_id)
            ->count();
        $wallet_incomes = \App\Income::where('sponsor_id', \Auth::user()->distributor_id)->sum('sponsor_amount');
        $total_incomes = \App\Income::where('sponsor_id', \Auth::user()->distributor_id)->sum('sponsor_amount');
        return view('backend.distributor_dashboard', compact('my_direct', 'total_downline', 'site_route', 'total_incomes', 'wallet_incomes', 'distributor'));
    }

    public function genealogy_tree(Request $request)
    {
        $site_route = $request->getSchemeAndHttpHost();
        $distributor = \App\Distributor::where('distributor_tracking_id', \Auth::user()->distributor_tracking_id)->first();
        return view('backend.genealogy_tree', compact('distributor'));

    }

}