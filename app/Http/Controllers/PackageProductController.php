<?php

namespace App\Http\Controllers;

use App\PackageProduct;
use Illuminate\Http\Request;
use Session;

class PackageProductController extends Controller
{
    protected $package_product;

    public function __construct(PackageProduct $package_product)
    {
        $this->package_product = $package_product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $package_products = \App\PackageProduct::all();
        return view('backend.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {

        return view('backend.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, $id)
    {

        $this->validate($request, [
            'product_id' => 'required',
            'qty' => 'required',
        ]);

        $package_product = \App\PackageProduct::create([
            'package_id' => $id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
        ]);

        $package_product->save();
        session()->flash('success', 'New Package Product is create Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function approved($id)
    {
        $package_product = \App\PackageProduct::find($id);

        if ($package_product) {
            $package_product->status = 4;
            $package_product->save();

            return redirect()->route('backend.banks.index');

        }
        return redirect()->back();
    }

    public function rejected($id)
    {
        $package_product = \App\PackageProduct::find($id);

        if ($package_product) {
            $package_product->status = 2;
            $package_product->save();
            return redirect()->route('backend.banks.index');

        }
        return redirect()->route('backend.banks.index');
    }

    public function show($id)
    {
        $package_product = \App\PackageProduct::find($id);

        if ($package_product) {
            return view('backend.banks.show', compact('category'));
        }
        return redirect()->route('backend.banks.index');
    }

    public function bank_view($id)
    {
        $package_product = \App\PackageProduct::find($id);
        if ($package_product) {
            return view('backend.banks.bank_view', compact('bank'));
        }
        return redirect()->route('backend.banks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $package_product = \App\PackageProduct::where('distributor_id', '=', $id)->find($id);
        if ($package_product) {
            return view('backend.banks.edit', compact('bank'));
        }
        return redirect()->route('backend.banks.index');
    }

    public function edit_store(Request $request, $id)
    {
        $this->validate($request, [
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'account_type' => 'required',
            'ifsc_code' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
        ]);

        $package_product = \App\PackageProduct::find($id);
        $package_product->account_holder_name = $request->input('account_holder_name');
        $package_product->account_number = $request->input('account_number');
        $package_product->account_type = $request->input('account_type');
        $package_product->ifsc_code = $request->input('ifsc_code');
        $package_product->bank_name = $request->input('bank_name');
        $package_product->bank_branch = $request->input('bank_branch');
        $package_product->updated_by = \Auth::user()->id;
        $package_product->save();
        session()->flash('success', 'bank Are Update Succussfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $package_product = \App\PackageProduct::find($id);
        if ($package_product->count()) {
            $package_product->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->back();
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
        return redirect()->back();
    }

}