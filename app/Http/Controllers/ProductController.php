<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = \App\Product::all();
        return view('backend.products.index', compact('products'));
    }

    public function single_view($id)
    {
        $product = \App\Product::find($id);
        return view('backend.products.single_view', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'hsn_code' => 'required',
            'product_code' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'serial_no' => 'required',
            'mrp' => 'required',
            'distributor_price' => 'required',
            'bussiness_volume' => 'required',
            'actual_price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $product = \App\Product::create([
            'name' => $request->input('name'),
            'hsn_code' => $request->input('hsn_code'),
            'product_code' => $request->input('product_code'),
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'serial_no' => $request->input('serial_no'),
            'description' => $request->input('description'),
            'status' => 1,
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $product->image = 'upload/' . $fullname;
        }
        $product_price = \App\ProductPrice::create([
            'product_id' => $product->id,
            'mrp' => $request->input('mrp'),
            'gst' => $request->input('gst'),
            'distributor_price' => $request->input('distributor_price'),
            'bussiness_volume' => $request->input('bussiness_volume'),
            'actual_price' => $request->input('actual_price'),
        ]);

        $product->save();
        session()->flash('success', 'New product is create Successfully');
        return redirect()->route('backend.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $product = \App\Product::find($id);

        if ($product) {
            return view('backend.products.show', compact('category'));
        }
        return redirect()->route('backend.products.index');
    }

    public function active($id)
    {
        $product = \App\Product::find($id);

        if ($product) {
            $product->status = 1;
            $product->save();
        }
        return redirect()->route('backend.products.index');
    }

    public function deactive($id)
    {
        $product = \App\Product::find($id);
        if ($product) {
            $product->status = 0;
            $product->save();
        }
        return redirect()->route('backend.products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = \App\Product::with('product_price')->find($id);
        $categories = \App\Category::all();

        if ($product) {
            return view('backend.products.edit', compact('product', 'categories'));
        }
        return redirect()->route('backend.products.index');
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
            'name' => 'required',
            'hsn_code' => 'required',
            'product_code' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'serial_no' => 'required',
            'mrp' => 'required',
            'distributor_price' => 'required',
            'bussiness_volume' => 'required',
            'actual_price' => 'required',
            'description' => 'required',
        ]);

        $product = \App\Product::find($id);
        $product->name = $request->input('name');
        $product->hsn_code = $request->input('hsn_code');
        $product->product_code = $request->input('product_code');
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->serial_no = $request->input('serial_no');
        $product->description = $request->input('description');

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $product->image = 'upload/' . $fullname;
        }
        $product->save();
        $product->product_price->mrp = $request->input('mrp');
        $product->product_price->gst = $request->input('gst');
        $product->product_price->distributor_price = $request->input('distributor_price');
        $product->product_price->bussiness_volume = $request->input('bussiness_volume');
        $product->product_price->actual_price = $request->input('actual_price');
        $product->product_price->save();
        session()->flash('success', 'Product is Update Successfully');

        return redirect()->route('backend.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->group->find($id);
        if ($product->count()) {
            $product->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->route('backend.products.index');
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
        return redirect()->route('backend.products.index');
    }

}