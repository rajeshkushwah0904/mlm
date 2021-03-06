<?php

namespace App\Http\Controllers;

use App\Exports\DistributorsExport;
use App\Http\Controllers\Controller;
use App\User;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class DistributorController extends Controller
{

    public function export()
    {
        return Excel::download(new DistributorsExport, 'distributor_list.xlsx');
    }

    public function register(Request $request)
    {
        $sponsor_tracking_id = $request->sponsor_tracking_id;
        return view('distributors.register', compact('sponsor_tracking_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function register_send_otp(Request $request)
    {

        $username = "Rightwayfuture";
        $password = "Benchmark@123";
        $sender = "RWFTPL";

//---------------------------------

        $distributor_name = $request->name;
        $mobile = $request->mobile;
        $otp = rand(100000, 999999);
        $minutes = 60;
        $cookie = cookie('otp_mobile', $mobile . "," . $otp, $minutes);
        $message = "Dear " . $distributor_name . ", " . $otp . " is the OTP for your login at Rightway Future. In case you have not requested this, please contact us at info@rightwayfuture.com Rightway Future";
        $username = urlencode($username);
        $password = urlencode($password);
        $sender = urlencode($sender);
        $message = urlencode($message);

        $parameters = "username=" . $username . "&password=" . $password . "&mobile=" . $mobile . "&sendername=" . $sender . "&message=" . $message . "&templateid=1707163395171735226";

        $url = "http://priority.muzztech.in/sms_api/sendsms.php";

        $ch = curl_init($url);

        if (isset($_POST)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        } else {
            $get_url = $url . "?" . $parameters;
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_URL, $get_url);
        }

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0); // DO NOT RETURN HTTP HEADERS
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // RETURN THE CONTENTS OF THE CALL
        $return_val = curl_exec($ch);
        dd($return_val);
        if ($mobile) {
            return response()->json(['status' => true, 'message' => 'OTP Send Successfully'], 200)->cookie($cookie);
        } else {
            return response()->json(['status' => false, 'message' => 'Error Data Does Not Found. Please Try Again'], 401);
        }

    }

    public function register_store(Request $request)
    {

        $value = request()->cookie('otp_mobile');
        $otp_mobile = explode(',', $value);

        $sponsor_distributor = \App\Distributor::where('distributor_tracking_id', $request->input('sponsor_tracking_id'))->first();

        if ($sponsor_distributor) {
            if ($otp_mobile[0] == $request->mobile && $otp_mobile[1] == $request->otp) {

                $this->validate($request, [
                    'name' => 'required',
                    'address' => 'required',
                    'mobile' => ['required', 'string', 'max:255', 'unique:users'],
                    'email' => ['required', 'string', 'max:255', 'unique:users'],
                    'nominee' => 'required',
                ]);
                $random = rand(1000000, 9999999);
                $distributor = \App\Distributor::where('distributor_tracking_id', 'RF1' . $random)->first();
                if ($distributor) {
                    $random = rand(1000000, 9999999);
                }

                $distributor = \App\Distributor::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'address' => $request->input('address'),
                    'mobile' => $request->input('mobile'),
                    'status' => 1,
                    'distributor_is_paid' => 0,
                    'sponsor_id' => $sponsor_distributor->id,
                    'nominee' => $request->input('nominee'),
                    'joining_date' => date('Y-m-d H:i:s'),
                    'distributor_tracking_id' => 'RF1' . $random,
                ]);

                $passwod = rand(1000000, 9999999);
                $user = \App\User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'distributor_tracking_id' => $distributor->distributor_tracking_id,
                    'distributor_id' => $distributor->id,
                    'role' => '3',
                    'status' => 1,
                    'mobile' => $request->input('mobile'),
                    'password' => Hash::make($passwod),
                ]);
                $module_permissions = \App\ModulePermission::all();

                foreach ($module_permissions as $module_permission) {
                    $permission = \App\Permission::create([
                        'user_id' => $user->id,
                        'role_id' => $user->role,
                        'module_id' => $module_permission->id,
                        'module_name' => $module_permission->route_name,
                        'p_index' => 1,
                        'p_create' => 1,
                        'p_view' => 1,
                        'p_edit' => 1,
                        'p_delete' => 1,
                    ]);
                }

                $ditributor_level = \App\DistributorLevel::create([
                    'L0' => $distributor->id,
                    'L1' => $sponsor_distributor->id,
                    'L2' => $sponsor_distributor->sponsor_id,
                ]);
                $lever_l3 = \App\Distributor::find($sponsor_distributor->sponsor_id);
                if ($lever_l3) {
                    $ditributor_level->L3 = $lever_l3->sponsor_id;
                    $lever_l4 = \App\Distributor::find($lever_l3->sponsor_id);
                    if ($lever_l4) {
                        $ditributor_level->L4 = $lever_l4->sponsor_id;
                    }
                }

                $ditributor_level->save();
                $abc = Auth::login($user);

// Welcome SMS Start

                $username = "Rightwayfuture";
                $password = "Benchmark@123";
                $sender = "RWFTPL";

                $distributor_name = $distributor->name;
                $mobile = $distributor->mobile;
                $message = "Dear " . $distributor_name . ", It is our great pleasure to have you on board! A hearty welcome to you at Rightway Future! Your referral id is " . $distributor->distributor_tracking_id . " and login password is " . $passwod . ". Kindly use it. Once you logged in, you can reset it to a new password.";
                $username = urlencode($username);
                $password = urlencode($password);
                $sender = urlencode($sender);
                $message = urlencode($message);

                $parameters = "username=" . $username . "&password=" . $password . "&mobile=" . $mobile . "&sendername=" . $sender . "&message=" . $message . "&templateid=1707163482327931806";

                $url = "http://priority.muzztech.in/sms_api/sendsms.php";

                $ch = curl_init($url);

                if (isset($_POST)) {
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
                } else {
                    $get_url = $url . "?" . $parameters;
                    curl_setopt($ch, CURLOPT_POST, 0);
                    curl_setopt($ch, CURLOPT_URL, $get_url);
                }

                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0); // DO NOT RETURN HTTP HEADERS
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // RETURN THE CONTENTS OF THE CALL
                $return_val = curl_exec($ch);

// Welcome SMS Stop

                session()->flash('success', 'New Distributor Register Successfully');
                return redirect()->route('backend.distributor.dashboard');
            } else {
                session()->flash('error', 'OTP does not Match ! Please try Again');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Sponsor ID is Incorrect');
            return redirect()->back();
        }
    }

    public function distributor_downline_filter_data(Request $request)
    {
        $distributor_levels = \App\DistributorLevel::where('L1', \Auth::user()->distributor_id)->orWhere('L2', \Auth::user()->distributor_id)->orWhere('L3', \Auth::user()->distributor_id)->orWhere('L4', \Auth::user()->distributor_id)->get('L0');

        if ($request->distributor_tracking_id) {
            $distributors = \App\Distributor::where('distributor_tracking_id', $request->distributor_tracking_id)->whereIn('id', $distributor_levels->map(function ($value) {
                return $value->L0;
            })
            )->get();

        } else if ($request->distributor_name) {
            $distributors = \App\Distributor::where('name', $request->distributor_name)->whereIn('id', $distributor_levels->map(function ($value) {
                return $value->L0;
            })
            )->get();

        } else if ($request->distributor_mobile) {
            $distributors = \App\Distributor::where('mobile', $request->distributor_mobile)->whereIn('id', $distributor_levels->map(function ($value) {
                return $value->L0;
            })
            )->get();

        } else if ($request->sponsor_id) {
            $distributors = \App\Distributor::where('sponsor_id', $request->sponsor_id)->whereIn('id', $distributor_levels->map(function ($value) {
                return $value->L0;
            })
            )->get();

        } else if ($request->package_id) {
            if ($request->package_id == 'Null') {
                $distributors = \App\Distributor::whereNull('package_id')->whereIn('id', $distributor_levels->map(function ($value) {
                    return $value->L0;
                })
                )->get();

            } else {
                $distributors = \App\Distributor::where('package_id', $request->package_id)->whereIn('id', $distributor_levels->map(function ($value) {
                    return $value->L0;
                })
                )->get();

            }
        } else if ($request->start_date && $request->end_date) {
            $distributors = \App\Distributor::whereBetween('joining_date', [$request->start_date, $request->end_date])->get();

        } else {
            $distributors = \App\Distributor::whereIn('id', $distributor_levels->map(function ($value) {
                return $value->L0;
            })
            )->get();

        }
        return view('backend.distributors.distributor_downline_filter_data', compact('distributors'));

    }

    public function distributor_filter_data(Request $request)
    {
        $domain_name = request()->getHost();

        if ($request->distributor_tracking_id) {
            $distributors = \App\Distributor::where('distributor_tracking_id', $request->distributor_tracking_id)->get();
        } else if ($request->distributor_name) {
            $distributors = \App\Distributor::where('name', $request->distributor_name)->get();
        } else if ($request->distributor_mobile) {
            $distributors = \App\Distributor::where('mobile', $request->distributor_mobile)->get();
        } else if ($request->sponsor_id) {
            $distributors = \App\Distributor::where('sponsor_id', $request->sponsor_id)->get();
        } else if ($request->package_id) {
            if ($request->package_id == 'Null') {
                $distributors = \App\Distributor::whereNull('package_id')->get();
            } else {
                $distributors = \App\Distributor::where('package_id', $request->package_id)->get();

            }
        } else if ($request->start_date && $request->end_date) {
            $distributors = \App\Distributor::whereBetween('joining_date', [$request->start_date, $request->end_date])->get();

        } else if ($request->kyc_id) {

            if ($request->kyc_id == 5) {
                $kycs = \App\Kyc::all();
                $distributors = \App\Distributor::whereNotIn('id', $kycs->map(function ($kyc) {
                    return $kyc->distributor_id;
                }))->get();
            } else {

                $distributors = \App\Distributor::join('kycs as kyc', 'kyc.distributor_id', '=', 'distributors.id')
                    ->where('kyc.status', '=', $request->kyc_id)
                    ->select('distributors.*')
                    ->with('kycs')
                    ->get();
            }

        } else {
            $distributors = \App\Distributor::all();
        }
        return view('backend.distributors.distributor_filter_data', compact('distributors', 'domain_name'));

    }

    function list(Request $request) {
        if (\Auth::user()->role == 1) {
            $packages = \App\Package::all();
            $distributors = \App\Distributor::all();
            $domain_name = request()->getHost();
            return view('backend.distributors.list', compact('distributors', 'packages', 'domain_name'));
        } else {
            $distributors = \App\Distributor::where('sponsor_tracking_id', '=', \Auth::user()->distributor_tracking_id)->get();
        }
        return view('backend.distributors.list', compact('distributors'));
    }

    public function activate($id)
    {
        $distributor = \App\Distributor::find($id);
        if ($distributor) {
            $distributor->status = 1;
            $distributor->save();
            return redirect()->route('backend.distributors.list');
        }
        return redirect()->route('backend.distributors.list');
    }

    public function block($id)
    {
        $distributor = \App\Distributor::find($id);
        if ($distributor) {
            $distributor->status = 2;
            $distributor->save();
            return redirect()->route('backend.distributors.list');
        }
        return redirect()->route('backend.distributors.list');
    }

    public function downline_list(Request $request)
    {
        $distributor_levels = \App\DistributorLevel::where('L1', \Auth::user()->distributor_id)->orWhere('L2', \Auth::user()->distributor_id)->orWhere('L3', \Auth::user()->distributor_id)->orWhere('L4', \Auth::user()->distributor_id)->get('L0');
        $packages = \App\Package::all();
        if (\Auth::user()->role == 1) {
            $distributors = \App\Distributor::whereIn('id', $distributor_levels->map(function ($value) {
                return $value->L0;
            })
            )->get();

            return view('backend.distributors.downline_list', compact('distributors', 'packages'));

        } else {

            $distributors = \App\Distributor::whereIn('id', $distributor_levels->map(function ($value) {
                return $value->L0;
            })
            )->get();
        }
        return view('backend.distributors.downline_list', compact('distributors', 'packages'));
    }

    public function login(Request $request)
    {
        return view('distributors.login');
    }

    public function change_password_popup(Request $request)
    {
        $distributor = \App\Distributor::find($request->distributor_id);
        return view('backend.distributors.change_password_popup', compact('distributor'));
    }

    public function login_store(Request $request)
    {
        $user = \App\User::where('distributor_tracking_id', '=', $request->distributor_tracking_id)->where('status', '=', '1')->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $abc = Auth::login($user);
                session()->flash('success', 'Distributor is Login Successfully');
                return redirect()->route('backend.distributor.dashboard');
            } else {
                session()->flash('error', 'Data does not match please try Again');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Data does not match please try Again');
            return redirect()->back();
        }

    }

    public function as_login(Request $request)
    {
        $user = \App\User::where('distributor_tracking_id', '=', $request->distributor_tracking_id)->where('status', '=', '1')->first();
        if ($user) {
            $abc = Auth::login($user);
            session()->flash('success', 'Distributor is Login Successfully');
            return redirect()->route('backend.distributor.dashboard');
        } else {
            session()->flash('error', 'Data does not match please try Again');
            return redirect()->back();
        }

    }

}