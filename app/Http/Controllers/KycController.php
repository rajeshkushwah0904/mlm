<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kyc;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class KycController extends Controller
{
    protected $kyc;

    public function __construct(Kyc $kyc)
    {
        $this->group = $kyc;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $kycs = \App\Kyc::all();
        return view('backend.kycs.index', compact('kycs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.kycs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
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

        $kyc = \App\Kyc::create([
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
            'distributor_id' => \Auth::user()->distributor_id,
            'distributor_user_id' => \Auth::user()->id,
            'added_by' => \Auth::user()->id,
        ]);
        if ($request->file('pancard_file')) {
            $file = $request->file('pancard_file');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $kyc->pancard_file = 'upload/' . $fullname;
        }
        if ($request->file('aadhaar_card_file')) {
            $file = $request->file('aadhaar_card_file');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $kyc->aadhaar_card_file = 'upload/' . $fullname;
        }
        if ($request->file('bank_document')) {
            $file = $request->file('bank_document');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $kyc->bank_document = 'upload/' . $fullname;
        }
        $kyc->save();
        session()->flash('success', 'New Package is create Successfully');
        return redirect()->route('backend.kycs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function approved($id)
    {
        $kyc = \App\Kyc::find($id);

        if ($kyc) {
            $kyc->status = 4;
            $kyc->save();

         return redirect()->route('backend.kycs.index');
;
        }
        return redirect()->route('backend.kycs.index');
    }

    public function rejected($id)
    {
        $kyc = \App\Kyc::find($id);

        if ($kyc) {
            $kyc->status = 2;
            $kyc->save();
            return redirect()->route('backend.kycs.index');

        }
        return redirect()->route('backend.kycs.index');
    }

    public function show($id)
    {
        $kyc = \App\Kyc::find($id);

        if ($kyc) {
            return view('backend.kycs.show', compact('category'));
        }
        return redirect()->route('backend.kycs.index');
    }

    public function kyc_view($id)
    {
        $kyc = \App\Kyc::find($id);
        if ($kyc) {
            return view('backend.kycs.kyc_view', compact('kyc'));
        }
        return redirect()->route('backend.kycs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $kyc = \App\Kyc::where('distributor_id', '=', $id)->find($id);
        if ($kyc) {
            return view('backend.kycs.edit', compact('kyc'));
        }
        return redirect()->route('backend.kycs.index');
    }

    public function edit_store(Request $request, $id)
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

        $kyc = \App\Kyc::find($id);
        $kyc->pancard_no = $request->input('pancard_no');
        $kyc->aadhaarcard_no = $request->input('aadhaarcard_no');
        $kyc->account_holder_name = $request->input('account_holder_name');
        $kyc->account_number = $request->input('account_number');
        $kyc->account_type = $request->input('account_type');
        $kyc->ifsc_code = $request->input('ifsc_code');
        $kyc->bank_name = $request->input('bank_name');
        $kyc->bank_branch = $request->input('bank_branch');
        $kyc->pancard_file = $request->input('pancard_file');
        $kyc->aadhaar_card_file = $request->input('aadhaar_card_file');
        $kyc->bank_document = $request->input('bank_document');
        $kyc->status = 1;
        if ($request->file('pancard_file')) {
            $file = $request->file('pancard_file');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $kyc->pancard_file = 'upload/' . $fullname;
        }
        if ($request->file('aadhaar_card_file')) {
            $file = $request->file('aadhaar_card_file');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $kyc->aadhaar_card_file = 'upload/' . $fullname;
        }
        if ($request->file('bank_document')) {
            $file = $request->file('bank_document');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $kyc->bank_document = 'upload/' . $fullname;
        }
        $kyc->save();
        session()->flash('success', 'KYC Are Update Succussfully');
        return redirect()->route('backend.kycs.index');

    }

    public function update(Request $request)
    {
        if ($request->distributor_id) {
            $distributor_id = $request->distributor_id;
        } else {
            $distributor_id = \Auth::user()->distributor_id;
        }
        $kyc = \App\Kyc::where('distributor_id', $distributor_id)->first();

        if ($kyc) {
            return view('backend.kycs.kyc_view', compact('kyc'));
        } else {
            return view('backend.kycs.update', compact('distributor_id'));
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
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

        $kyc = \App\Kyc::create([
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
            $kyc->pancard_file = 'upload/' . $fullname;
        }
        if ($request->file('aadhaar_card_file')) {
            $file = $request->file('aadhaar_card_file');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $kyc->aadhaar_card_file = 'upload/' . $fullname;
        }
        if ($request->file('bank_document')) {
            $file = $request->file('bank_document');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $kyc->bank_document = 'upload/' . $fullname;
        }
        $kyc->save();
        session()->flash('success', 'KYC Are Update Succussfully');
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
        $kyc = $this->group->find($id);
        if ($kyc->count()) {
            $kyc->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->route('backend.kycs.index');
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
        return redirect()->route('backend.kycs.index');
    }

}