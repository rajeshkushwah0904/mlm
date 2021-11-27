<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Redirect;
use Session;

class PackageController extends Controller
{
    protected $package;

    public function __construct(Package $package)
    {
        $this->group = $package;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $packages = \App\Package::all();
        return view('backend.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $products = \App\Product::all();
        return view('backend.packages.create', compact('products'));
    }

    public function add_product(Request $request)
    {
        $products = \App\Product::all();
        return view('backend.packages.add_product', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'package_name' => 'required',
            'amount' => 'required',
            'sponsor_income' => 'required',
            'business_volume'=> 'required',
        ]);

        $package = \App\Package::create([
            'package_name' => $request->input('package_name'),
            'amount' => $request->input('amount'),
             'business_volume' => $request->input('business_volume'),
            'sponsor_income' => $request->input('sponsor_income'),
        ]);
        $input = $request->all();
        for ($i = 0; $i < count($input['product_id']); $i++) {

            $package_product = \App\PackageProduct::create([
                'package_id' => $package->id,
                'product_id' => $input['product_id'][$i],
                'qty' => $input['qty'][$i],
            ]);
        }
        session()->flash('success', 'New Package is create Successfully');
        return redirect()->route('backend.packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function purchase_package(Request $request)
    {
        $distributor = \App\Distributor::find(\Auth::user()->distributor_id);
        $select_package = null;
        if ($request->package_id) {
            $select_package = \App\Package::find($request->package_id);
        }
        $packages = \App\Package::all();
        if ($packages) {
            return view('backend.packages.purchase_package', compact('packages', 'select_package', 'distributor'));
        }
    }

  public function purchase_package_store(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

                $package_id = $response['description'];
                $package = \App\Package::find($package_id);
                $distributor = \App\Distributor::find(\Auth::user()->distributor_id);
                $distributor->package_id = $package->id;
                $distributor->activate_date = date('Y-m-d H:i:s');
                $distributor->save();
                $distributor_level = \App\DistributorLevel::where('L0', \Auth::user()->distributor_id)->first();
                if ($distributor_level->L1) {
                    $level1_income = $package->amount * $package->sponsor_income / 100;
                    $income = \App\Income::create([
                        'distributor_id' => \Auth::user()->distributor_id,
                        'amount' => $package->amount,
                        'package_id' => $package->id,
                        'income_type' => 1,
                        'status' => 1,
                        'level' => 'L1',
                        'level_percentage' => $package->sponsor_income,
                        'sponsor_id' => $distributor_level->L1,
                        'sponsor_amount' => $level1_income,
                    ]);
                }
                if ($distributor_level->L2) {
                    $level2_income = $package->amount * 5 / 100;
                    $income = \App\Income::create([
                        'distributor_id' => \Auth::user()->distributor_id,
                        'amount' => $package->amount,
                        'package_id' => $package->id,
                        'income_type' => 1,
                        'status' => 1,
                        'level' => 'L2',
                        'level_percentage' => 5,
                        'sponsor_id' => $distributor_level->L2,
                        'sponsor_amount' => $level2_income,
                    ]);
                }
                if ($distributor_level->L3) {
                    $level3_income = $package->amount * 3 / 100;
                    $income = \App\Income::create([
                        'distributor_id' => \Auth::user()->distributor_id,
                        'amount' => $package->amount,
                        'package_id' => $package->id,
                        'income_type' => 1,
                        'status' => 1,
                        'level' => 'L3',
                        'level_percentage' => 3,
                        'sponsor_id' => $distributor_level->L3,
                        'sponsor_amount' => $level3_income,
                    ]);
                }
                if ($distributor_level->L4) {
                    $level4_income = $package->amount * 2 / 100;
                    $income = \App\Income::create([
                        'distributor_id' => \Auth::user()->distributor_id,
                        'amount' => $package->amount,
                        'package_id' => $package->id,
                        'income_type' => 1,
                        'status' => 1,
                        'level' => 'L4',
                        'level_percentage' => 2,
                        'sponsor_id' => $distributor_level->L4,
                        'sponsor_amount' => $level4_income,
                    ]);
                }
                return redirect()->back();

            } catch (\Exception $e) {
                return $e->getMessage();
                \Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }
    }



    public function purchase_for_other(Request $request)
    {
        $distributors = \App\Distributor::whereNull('package_id')->get();
        $packages = \App\Package::all();
            return view('backend.packages.purchase_for_other', compact('packages', 'distributors'));

    }


    public function purchase_for_other_store(Request $request)
    {
        $input = $request->all();

                $package_id = $input['package_id'];
                $package = \App\Package::find($package_id);
                $distributor = \App\Distributor::find($input['distributor_id']);
                $distributor->package_id = $package->id;
                $distributor->activate_date = date('Y-m-d H:i:s');
                $distributor->save();
                $distributor_level = \App\DistributorLevel::where('L0', $input['distributor_id'])->first();
                if ($distributor_level->L1) {
                    $level1_income = $package->amount * $package->sponsor_income / 100;
                    $income = \App\Income::create([
                        'distributor_id' => $input['distributor_id'],
                        'amount' => $package->amount,
                        'package_id' => $package->id,
                        'income_type' => 1,
                        'status' => 1,
                        'level' => 'L1',
                        'level_percentage' => $package->sponsor_income,
                        'sponsor_id' => $distributor_level->L1,
                        'sponsor_amount' => $level1_income,
                    ]);
                }
                if ($distributor_level->L2) {
                    $level2_income = $package->amount * 5 / 100;
                    $income = \App\Income::create([
                        'distributor_id' => $input['distributor_id'],
                        'amount' => $package->amount,
                        'package_id' => $package->id,
                        'income_type' => 1,
                        'status' => 1,
                        'level' => 'L2',
                        'level_percentage' => 5,
                        'sponsor_id' => $distributor_level->L2,
                        'sponsor_amount' => $level2_income,
                    ]);
                }
                if ($distributor_level->L3) {
                    $level3_income = $package->amount * 3 / 100;
                    $income = \App\Income::create([
                        'distributor_id' => $input['distributor_id'],
                        'amount' => $package->amount,
                        'package_id' => $package->id,
                        'income_type' => 1,
                        'status' => 1,
                        'level' => 'L3',
                        'level_percentage' => 3,
                        'sponsor_id' => $distributor_level->L3,
                        'sponsor_amount' => $level3_income,
                    ]);
                }
                if ($distributor_level->L4) {
                    $level4_income = $package->amount * 2 / 100;
                    $income = \App\Income::create([
                        'distributor_id' => $input['distributor_id'],
                        'amount' => $package->amount,
                        'package_id' => $package->id,
                        'income_type' => 1,
                        'status' => 1,
                        'level' => 'L4',
                        'level_percentage' => 2,
                        'sponsor_id' => $distributor_level->L4,
                        'sponsor_amount' => $level4_income,
                    ]);
                }

                return redirect()->route('backend.distributors.list');
    }





   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $products = \App\Product::all();
        $package = \App\Package::with('package_products')->find($id);
        if ($package) {
            return view('backend.packages.edit', compact('package','products'));
        }
        return redirect()->route('backend.packages.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
      
        $this->validate($request, [
    'package_name' => 'required',
    'amount' => 'required',
    'sponsor_income' => 'required',
    'business_volume' => 'required',
]);

        $input = $request->all();
        $package = \App\Package::with('package_products')->find($id);
        $package->package_name = $input['package_name'];
        $package->amount = $input['amount'];
        $package->business_volume = $input['business_volume'];
        $package->sponsor_income = $input['sponsor_income'];
        $input = $request->all();

for ($i = 0; $i < count($input['package_product']); $i++) {
    $package_product = \App\PackageProduct::find($input['package_product'][$i]);
    $package_product->package_id = $package->id;
    $package_product->product_id = $input['product_id'][$i];
    $package_product->qty = $input['qty'][$i];
    $package_product->save();
}
        $package->save();
        return redirect()->route('backend.packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $package = $this->group->find($id);
        if ($package->count()) {
            $package->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->route('backend.packages.index');
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
        return redirect()->route('backend.packages.index');
    }

}