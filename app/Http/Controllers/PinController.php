<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User;
use Auth;
use Session;
use Validator;
use App\Pin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Cookie;

class PinController extends Controller
{
       protected $pin;

    public function __construct(Pin $pin) {
        $this->category = $pin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pins = \App\Pin::where('transfer_to',\Auth::user()->distributor_tracking_id)->get();
        return view('backend.pins.index', compact('pins'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $packages = \App\Package::all();
        return view('backend.pins.create', compact('packages'));
    }

    
  
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
      
        $this->validate($request, [            
            'package_id' => 'required',
            'no_of_pin' => 'required',
            'transfer_to' => 'required',
        ]);
        for($i=0; $i<$request->no_of_pin; $i++){

        $pin = \App\Pin::create([
             'package_id' => $request->input('package_id'),
             'transfer_to' => $request->input('transfer_to'),
               'status' => 0, 
               'update_by' =>\Auth::user()->id, 
               'added_by' =>\Auth::user()->id,
               'generated_pin'=>rand(100000,999999),
        ]);
        }
        $distributor =\App\Distributor::where('distributor_tracking_id',$request->input('transfer_to'))->first();
       $package =\App\Package::find($request->input('package_id'));
        $income = \App\Income::create([
             'package_id' => $request->input('package_id'),
             'amount' => $package->amount,
              'distributor_tracking_id' => $distributor->distributor_tracking_id,
             'income_type' =>1,
              'sponsor_tracking_id' => $distributor->sponsor_tracking_id,
             'sponsor_amount' => $package->sponsor_income,
               'status' => 1, 
        ]);


        session()->flash('success', 'New Pin is create Successfully');
        return redirect()->route('backend.pins.index');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $pin = \App\Pin::find($id);
        
        if ($pin) {
            return view('backend.pins.show', compact('category'));
        }
        return redirect()->route('backend.pins.index');
    } 
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {       
        $pin = \App\Pin::find($id);
        if ($pin) {
            return view('backend.pins.edit', compact('category'));
        }
        return redirect()->route('backend.pins.index');
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
        $pin = \App\Pin::find($id);
        $pin->name = $input ['name'];   
        $pin->updated_by =\Auth::user()->id; 
        $pin->save();
        return redirect()->route('backend.pins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function destroy($id) {
        $pin = $this->group->find($id);
        if ($pin->count()) {
            $pin->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->route('backend.pins.index');
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
      return redirect()->route('backend.pins.index');
    }

}