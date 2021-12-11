<?php

namespace App\Http\Controllers;

use App\LegalDocument;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class LegalDocumentController extends Controller
{
     protected $legal_document;

    public function __construct(LegalDocument $legal_document)
    {
        $this->legal_document = $legal_document;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $legal_documents = \App\LegalDocument::all();
        return view('backend.legal_documents.index', compact('legal_documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.legal_documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'document_name' => 'required',
            'image' => 'required'
        ]);

        $legal_document = \App\LegalDocument::create([
            'document_name' => $request->input('document_name'),
            'status' =>1,
            'added_by' => \Auth::user()->id,
        ]);
        if ($request->file('image')) {
    $file = $request->file('image');
    $filename = $file->getClientOriginalName();
    $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
    $file->move("upload", $fullname);
    $legal_document->image = 'upload/' . $fullname;
}

        $legal_document->save();
        session()->flash('success', 'New legal_document is create Successfully');
        return redirect()->route('backend.legal_documents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function active($id)
    {
        $legal_document = \App\LegalDocument::find($id);

        if ($legal_document) {
            $legal_document->status = 1;
            $legal_document->save();

            return redirect()->route('backend.legal_documents.index');

        }
        return redirect()->route('backend.legal_documents.index');
    }

    public function in_active($id)
    {
        $legal_document = \App\LegalDocument::find($id);

        if ($legal_document) {
            $legal_document->status = 2;
            $legal_document->save();
            return redirect()->route('backend.legal_documents.index');

        }
        return redirect()->route('backend.legal_documents.index');
    }

    public function show($id)
    {
        $legal_document = \App\LegalDocument::find($id);

        if ($legal_document) {
            return view('backend.legal_documents.show', compact('category'));
        }
        return redirect()->route('backend.legal_documents.index');
    }

    public function legal_document_view($id)
    {
        $legal_document = \App\LegalDocument::find($id);
        if ($legal_document) {
            return view('backend.legal_documents.legal_document_view', compact('legal_document'));
        }
        return redirect()->route('backend.legal_documents.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $legal_document = \App\LegalDocument::where('distributor_id', '=', $id)->find($id);
        if ($legal_document) {
            return view('backend.legal_documents.edit', compact('legal_document'));
        }
        return redirect()->route('backend.legal_documents.index');
    }

    public function edit_store(Request $request, $id)
    {
       $this->validate($request, [
    'document_name' => 'required',
    'image' => 'required',
    'status' => 'required',
    'added_by' => 'required',
]);


        $legal_document = \App\LegalDocument::find($id);
        $legal_document->document_name = $request->input('document_name');
      if ($request->file('image')) {
    $file = $request->file('image');
    $filename = $file->getClientOriginalName();
    $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
    $file->move("upload", $fullname);
    $legal_document->image = 'upload/' . $fullname;
}
        $legal_document->save();
        session()->flash('success', 'legal_document Are Update Succussfully');
        return redirect()->route('backend.legal_documents.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $legal_document = \App\LegalDocument::find($id);

        if ($legal_document->count()) {
            $legal_document->delete();
            session()->flash('success', 'Selected legal_documents deleted successfully.');
            return redirect()->route('backend.legal_documents.index');
        }
        session()->flash('error', 'Selected legal_documents dose not found in database please try after some time.');
        return redirect()->route('backend.legal_documents.index');
    }

}
