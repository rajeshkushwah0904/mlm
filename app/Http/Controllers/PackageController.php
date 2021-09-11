<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Package;
use Mail;
use App\Mail\SendMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PackageController extends Controller
{
     protected $package;

    public function __construct(Package $package) {
        $this->group = $package;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $packages = \App\Package::all();
        return view('backend.packages.index', compact('packages'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() { 
        return view('backend.packages.create');
    }

    public function add_product(Request $request) { 
        return view('backend.packages.add_product');
    }
    
  
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

        $this->validate($request, [            
            'package_name' => 'required',
             'amount' => 'required',
              'sponsor_income' => 'required',
        ]);
        
        $package = \App\Package::create([
             'package_name' => $request->input('package_name'),   
               'amount' => $request->input('amount'),  
                 'sponsor_income' => $request->input('sponsor_income')         
        ]);
        $input = $request->all();
        for($i = 0; $i < count($input['service_name']); $i++) {

		$package_product = \App\PackageProduct::create([
			'package_id'=>$package->id,
            'service_name'=>$input['service_name'][$i],
            'price'=>$input['price'][$i],
            'hsn_sac'=>$input['hsn_sac'][$i],
            'gst_rate'=>$input['gst_rate'][$i],
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
    public function show($id) {
        $package = \App\Package::find($id);
        
        if ($package) {
            return view('backend.packages.show', compact('category'));
        }
        return redirect()->route('backend.packages.index');
    } 
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
        $package = \App\Package::with('package_products')->find($id);
        
        if ($package) {
            return view('backend.packages.edit', compact('package'));
        }
        return redirect()->route('backend.packages.index');
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
        $package = \App\Package::with('package_products')->find($id);
        $package->package_name = $input ['package_name'];  
        $package->amount = $input['amount'];  
        $package->sponsor_income = $input['sponsor_income']; 
        foreach($package->package_products as $i=>$package_product){
              $package_product = \App\PackageProduct::find($package_product->id);
            $package_product->service_name=$input['service_name'][$i];
            $package_product->price=$input['price'][$i];
            $package_product->hsn_sac=$input['hsn_sac'][$i];
            $package_product->gst_rate=$input['gst_rate'][$i];
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
     public function destroy($id) {
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