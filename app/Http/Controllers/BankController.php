<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use Session;

class BankController extends Controller
{
    protected $bank;

    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $banks = \App\Bank::all();
        return view('backend.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'account_type' => 'required',
            'ifsc_code' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
        ]);

        $bank = \App\Bank::create([
            'account_holder_name' => $request->input('account_holder_name'),
            'account_number' => $request->input('account_number'),
            'account_type' => $request->input('account_type'),
            'ifsc_code' => $request->input('ifsc_code'),
            'bank_name' => $request->input('bank_name'),
            'bank_branch' => $request->input('bank_branch'),
            'added_by' => \Auth::user()->id,
            'updated_by' => \Auth::user()->id,
            'status' => 1,
        ]);
        $bank->save();
        session()->flash('success', 'New Bank is create Successfully');
        return redirect()->route('backend.banks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function active($id)
    {
        $bank = \App\Bank::find($id);

        if ($bank) {
            $bank->status = 1;
            $bank->save();

            return redirect()->route('backend.banks.index');

        }
        return redirect()->route('backend.banks.index');
    }

    public function in_active($id)
    {
        $bank = \App\Bank::find($id);

        if ($bank) {
            $bank->status = 2;
            $bank->save();
            return redirect()->route('backend.banks.index');

        }
        return redirect()->route('backend.banks.index');
    }

    public function show($id)
    {
        $bank = \App\Bank::find($id);

        if ($bank) {
            return view('backend.banks.show', compact('category'));
        }
        return redirect()->route('backend.banks.index');
    }

    public function bank_view($id)
    {
        $bank = \App\Bank::find($id);
        if ($bank) {
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
        $bank = \App\Bank::find($id);
        if ($bank) {
            return view('backend.banks.edit', compact('bank'));
        }
        return redirect()->route('backend.banks.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'account_type' => 'required',
            'ifsc_code' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
        ]);

        $bank = \App\Bank::find($id);
        $bank->account_holder_name = $request->input('account_holder_name');
        $bank->account_number = $request->input('account_number');
        $bank->account_type = $request->input('account_type');
        $bank->ifsc_code = $request->input('ifsc_code');
        $bank->bank_name = $request->input('bank_name');
        $bank->bank_branch = $request->input('bank_branch');
        $bank->updated_by = \Auth::user()->id;
        $bank->save();
        session()->flash('success', 'bank Are Update Succussfully');
        return redirect()->route('backend.banks.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $bank = \App\Bank::find($id);
        if ($bank->count()) {
            $bank->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->route('backend.banks.index');
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
        return redirect()->route('backend.banks.index');
    }

}