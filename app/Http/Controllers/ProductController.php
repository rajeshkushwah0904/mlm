<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User;
use Auth;
use Session;
use Validator;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Cookie;

class ProductController extends Controller
{
      protected $product;

    public function __construct(Product $product) {
        $this->group = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $products = \App\Product::all();
        return view('backend.products.index', compact('products'));
    }

        public function single_view($id) {
        $product = \App\Product::find($id);
        return view('backend.products.single_view', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $categories = \App\Category::all();
        return view('backend.products.create', compact('categories'));
    }

    
  
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
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
            'image' => 'required'
        ]);
        
        $product = \App\Product::create([
             'name' => $request->input('name'),   
                 'hsn_code' => $request->input('hsn_code'),  
                  'product_code' => $request->input('product_code'),   
               'category_id' => $request->input('category_id'),  
                 'subcategory_id' => $request->input('subcategory_id'),  
                  'serial_no' => $request->input('serial_no'),    
               'description' => $request->input('description')
        ]);
        if($request->file('image')) {
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
        session()->flash('success', 'New Package is create Successfully');
        return redirect()->route('backend.products.index');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $product = \App\Product::find($id);
        
        if ($product) {
            return view('backend.products.show', compact('category'));
        }
        return redirect()->route('backend.products.index');
    } 
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {       
        $product = \App\Product::where('distributor_id','=',$id)->find($id);
        if ($product) {
            return view('backend.products.edit', compact('package'));
        }
        return redirect()->route('backend.products.index');
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
       $this->validate($request, [            
            'package_name' => 'required',
             'amount' => 'required',
              'sponsor_income' => 'required',
        ]);
        $input = $request->all();
        $product = \App\Product::with('package_products')->find($id);
        $product->package_name = $input ['package_name'];  
        $product->amount = $input['amount'];  
        $product->sponsor_income = $input['sponsor_income']; 
        foreach($product->package_products as $i=>$product_product){
              $product_product = \App\ProductProduct::find($product_product->id);
            $product_product->service_name=$input['service_name'][$i];
            $product_product->price=$input['price'][$i];
            $product_product->hsn_sac=$input['hsn_sac'][$i];
            $product_product->gst_rate=$input['gst_rate'][$i];
            $product_product->save();
        }
           
        $product->save();
        return redirect()->route('backend.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function destroy($id) {
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