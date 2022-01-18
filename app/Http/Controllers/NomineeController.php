<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Nominee;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class NomineeController extends Controller
{

    public function index()
    {
        $nominees = \App\Nominee::all();
        return view('backend.nominees.index', compact('nominees'));
    }
    public function approved($id)
    {
        $nominee = \App\Nominee::find($id);

        if ($nominee) {
            $nominee->status = 4;
            $nominee->save();

            return redirect()->route('backend.nominees.index');

        }
        return redirect()->route('backend.nominees.index');
    }

    public function rejected($id)
    {
        $nominee = \App\Nominee::find($id);

        if ($nominee) {
            $nominee->status = 2;
            $nominee->save();
            return redirect()->route('backend.nominees.index');

        }
        return redirect()->route('backend.nominees.index');
    }

    public function update_store(Request $request)
    {
        $this->validate($request, [
            'pancard_no' => 'required',
            'aadhaarcard_no' => 'required',
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'account_type' => 'required',
            'ifsc_code' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'pancard_file' => 'required',
            'aadhaar_card_file' => 'required',
            'bank_document' => 'required',
        ]);

        $nominee = \App\Nominee::create([
            'pancard_no' => $request->input('pancard_no'),
            'aadhaarcard_no' => $request->input('aadhaarcard_no'),
            'account_holder_name' => $request->input('account_holder_name'),
            'account_number' => $request->input('account_number'),
            'account_type' => $request->input('account_type'),
            'ifsc_code' => $request->input('ifsc_code'),
            'bank_name' => $request->input('bank_name'),
            'bank_branch' => $request->input('bank_branch'),
            'pancard_file' => $request->input('pancard_file'),
            'aadhaar_card_file' => $request->input('aadhaar_card_file'),
            'bank_document' => $request->input('bank_document'),
            'distributor_id' => $request->distributor_id,
            'distributor_user_id' => \Auth::user()->id,
            'added_by' => \Auth::user()->id,
            'status' => 1,
        ]);
        if ($request->file('pancard_file')) {
            $file = $request->file('pancard_file');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $nominee->pancard_file = 'upload/' . $fullname;
        }
        if ($request->file('aadhaar_card_file')) {
            $file = $request->file('aadhaar_card_file');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $nominee->aadhaar_card_file = 'upload/' . $fullname;
        }

        if ($request->file('backend_aadhaar_card_file')) {
            $file = $request->file('backend_aadhaar_card_file');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $nominee->backend_aadhaar_card_file = 'upload/' . $fullname;
        }

        if ($request->file('bank_document')) {
            $file = $request->file('bank_document');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $nominee->bank_document = 'upload/' . $fullname;
        }
        $nominee->save();
        session()->flash('success', 'Nominee Are Update Succussfully');
        return redirect()->back();
    }

}