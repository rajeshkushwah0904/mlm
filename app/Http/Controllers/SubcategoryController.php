<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User;
use Auth;
use Session;
use Validator;
use App\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Cookie;

class SubcategoryController extends Controller
{
      protected $subcategory;

    public function __construct(Subcategory $subcategory) {
        $this->subcategory = $subcategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $subcategories = \App\Subcategory::all();
        return view('backend.subcategories.index', compact('subcategories'));
    }

        public function product_list($id) {
        $subcategory = \App\Subcategory::find($id);
        $products = \App\Product::where('subcategory_id',$id)->get();
        return view('backend.subcategories.product_list', compact('subcategory','products'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $categories = \App\Category::all();
        return view('backend.subcategories.create',compact('categories'));
    }

    
  
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request, [            
            'name' => 'required',
        ]);
        
        $subcategory = \App\Subcategory::create([
             'name' => $request->input('name'),  
             'category_id' => $request->input('category_id'),  
            'added_by' =>\Auth::user()->id, 
        ]);
       
        session()->flash('success', 'New Package is create Successfully');
        return redirect()->route('backend.subcategories.index');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $subcategory = \App\Subcategory::find($id);
        
        if ($subcategory) {
            return view('backend.subcategories.show', compact('category'));
        }
        return redirect()->route('backend.subcategories.index');
    } 
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {       
        $subcategory = \App\Subcategory::find($id);
        $categories = \App\Category::all();
        if ($subcategory) {
            return view('backend.subcategories.edit', compact('subcategory','categories'));
        }
        return redirect()->route('backend.subcategories.index');
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
       $this->validate($request, [            
            'name' => 'required',
        ]);
        $input = $request->all();
        $subcategory = \App\Subcategory::find($id);
        $subcategory->name = $input['name'];   
        $subcategory->category_id = $input['category_id']; 
        $subcategory->updated_by =\Auth::user()->id; 
        $subcategory->save();
        return redirect()->route('backend.subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function destroy($id) {
       $subcategory = \App\Subcategory::find($id);
        if ($subcategory->count()) {
            $subcategory->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->route('backend.subcategories.index');
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
      return redirect()->route('backend.subcategories.index');
    }

}