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
        $total_distributors = \App\Distributor::orderBy('id', 'ASC')->count();
        $total_active_distributors = \App\Distributor::whereNotNull('package_id')->count();
        $today_distributors = \App\Distributor::whereDate('activate_date', date('Y-m-d'))->count();
        $today_active_distributors = \App\Distributor::whereDate('activate_date', date('Y-m-d'))->whereNotNull('package_id')->count();
        $total_distributors = \App\Distributor::count();
        $total_business = \App\Income::sum('amount');

        $total_repurchase = \App\Income::where('income_type', 2)->sum('sponsor_amount');
        $total_activies_business = \App\Income::where('income_type', 1)->sum('sponsor_amount');

        $kycs = \App\Kyc::count();
        $pening_kycs = $total_distributors - $kycs;

        $products = \App\Product::all();
        return view('backend.dashboard', compact('packages', 'total_distributors', 'total_active_distributors', 'today_distributors', 'today_active_distributors', 'products', 'pening_kycs', 'total_business', 'total_repurchase', 'total_activies_business'));

    }
    public function get_all_distributor($distributor_id)
    {
        $abcd = null;
        $distributor = \App\Distributor::with('first_level_distributors')->find($distributor_id);
        foreach ($distributor->first_level_distributors as $first_level_distributor) {
            $abcd[] = $first_level_distributor->id;
            if ($this->get_all_distributor($first_level_distributor->id)) {
                $abcd[] = $this->get_all_distributor($first_level_distributor->id);
            }
        }
        return $abcd;
    }
    public function distributor_dashboard(Request $request)
    {
       $abcd = null;

$distributor = \App\Distributor::with('first_level_distributors')->find(\Auth::user()->distributor_id);
foreach ($distributor->first_level_distributors as $first_level_distributor) {
    $abcd[] = $first_level_distributor->id;
    if ($this->get_all_distributor($first_level_distributor->id)) {
        $abcd[] = $this->get_all_distributor($first_level_distributor->id);
    }

}
$str = json_encode($abcd);
$str1 = str_replace(array('[', ']'), '', $str);
$array_data = explode(',', $str1 . ',' . \Auth::user()->distributor_id);

$site_route = $request->getSchemeAndHttpHost();
$my_direct = \App\DistributorLevel::where('L1', \Auth::user()->distributor_id)->count();
$total_downline = count($array_data) - 1;
$wallet_incomes = \App\Income::where('sponsor_id', \Auth::user()->distributor_id)->sum('sponsor_amount');
$total_incomes = \App\Income::where('sponsor_id', \Auth::user()->distributor_id)->sum('sponsor_amount');
$self_business1 = 0;
$self_business2 = 0;
$self_business1 = \App\Income::where('sponsor_id', \Auth::user()->distributor_id)->whereIn('level', ['L1'])->sum('amount');
$self_business2 = \App\Income::where('sponsor_id', \Auth::user()->distributor_id)->whereIn('level', ['L0'])->sum('amount');
$self_business = $self_business1 + $self_business2;
$total_busness = \App\Income::whereIn('sponsor_id', $array_data)->sum('amount');

        return view('backend.distributor_dashboard', compact('my_direct', 'total_downline', 'site_route', 'total_incomes', 'wallet_incomes', 'distributor', 'total_busness', 'self_business'));
    }

    public function genealogy_tree(Request $request)
    {
        $site_route = $request->getSchemeAndHttpHost();
        if ($request->distributor_id) {
            $distributor = \App\Distributor::find($request->distributor_id);
        } else {
            $distributor = \App\Distributor::where('distributor_tracking_id', \Auth::user()->distributor_tracking_id)->first();

        }

        return view('backend.genealogy_tree', compact('distributor'));

    }

}