<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;
use Session;

class SupportController extends Controller
{
    protected $support;

    public function __construct(Support $support)
    {
        $this->support = $support;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $supports = \App\Support::all();
        return view('backend.supports.index', compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function add()
    {
        return view('backend.supports.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function add_store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ]);

        $support = \App\Support::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'distributor_id' => \Auth::user()->id,
            'status' => 0,
        ]);
        session()->flash('success', 'Your query is save Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function open($id)
    {
        $support = \App\Support::find($id);

        if ($support) {
            $support->status = 0;
            $support->save();
            return redirect()->route('backend.supports.index');
        }
        return redirect()->route('backend.supports.index');
    }

    public function closed($id)
    {
        $support = \App\Support::find($id);
        if ($support) {
            $support->status = 1;
            $support->save();
            return redirect()->route('backend.supports.index');
        }
        return redirect()->route('backend.supports.index');
    }

    public function show($id)
    {
        $support = \App\Support::find($id);
        if ($support) {
            return view('backend.supports.show', compact('category'));
        }
        return redirect()->route('backend.supports.index');
    }

    public function bank_view($id)
    {
        $support = \App\Support::find($id);
        if ($support) {
            return view('backend.supports.bank_view', compact('bank'));
        }
        return redirect()->route('backend.supports.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $support = \App\Support::where('distributor_id', '=', $id)->find($id);
        if ($support) {
            return view('backend.supports.edit', compact('bank'));
        }
        return redirect()->route('backend.supports.index');
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

        $support = \App\Support::find($id);
        $support->account_holder_name = $request->input('account_holder_name');
        $support->account_number = $request->input('account_number');
        $support->account_type = $request->input('account_type');
        $support->ifsc_code = $request->input('ifsc_code');
        $support->bank_name = $request->input('bank_name');
        $support->bank_branch = $request->input('bank_branch');
        $support->updated_by = \Auth::user()->id;
        $support->save();
        session()->flash('success', 'bank Are Update Succussfully');
        return redirect()->route('backend.supports.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $support = \App\Support::find($id);

        if ($support->count()) {
            $support->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->route('backend.supports.index');
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
        return redirect()->route('backend.supports.index');
    }

}