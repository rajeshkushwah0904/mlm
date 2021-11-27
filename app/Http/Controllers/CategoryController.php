<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User;
use Auth;
use Session;
use Validator;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Cookie;

class CategoryController extends Controller
{
       protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $categories = \App\Category::all();
        return view('backend.categories.index', compact('categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('backend.categories.create');
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
        
        $category = \App\Category::create([
             'name' => $request->input('name'),   
               'added_by' =>\Auth::user()->id, 
        ]);
       
        session()->flash('success', 'New Package is create Successfully');
        return redirect()->route('backend.categories.index');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $category = \App\Category::find($id);
        
        if ($category) {
            return view('backend.categories.show', compact('category'));
        }
        return redirect()->route('backend.categories.index');
    } 
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {       
        $category = \App\Category::find($id);
        if ($category) {
            return view('backend.categories.edit', compact('category'));
        }
        return redirect()->route('backend.categories.index');
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
        $category = \App\Category::find($id);
        $category->name = $input ['name'];   
        $category->updated_by =\Auth::user()->id; 
        $category->save();
        return redirect()->route('backend.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function destroy($id) {
        $category = \App\Category::find($id);
        if ($category->count()) {
            $category->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->route('backend.categories.index');
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
      return redirect()->route('backend.categories.index');
    }

}