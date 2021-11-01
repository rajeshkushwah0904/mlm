<?php

namespace App\Http\Controllers;

use App\Webcontent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebcontentController extends Controller
{
    protected $webcontent;

    public function __construct(Webcontent $webcontent)
    {
        $this->webcontent = $webcontent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $webcontents = \App\Webcontent::all();
        return view('backend.webcontents.index', compact('webcontents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function add_logo()
    {

        return view('backend.webcontents.add_logo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'webcontent_type' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $webcontent = \App\Webcontent::create([
            'webcontent_type' => $request->input('webcontent_type'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'added_by' => \Auth::user()->id,
            'status' => 1,
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $webcontent->image = 'upload/' . $fullname;
        }

        $webcontent->save();
        session()->flash('success', 'Data Add Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function active($id)
    {
        $webcontent = \App\Webcontent::find($id);

        if ($webcontent) {
            $webcontent->status = 1;
            $webcontent->save();

            return redirect()->route('backend.webcontents.index');

        }
        return redirect()->route('backend.webcontents.index');
    }

    public function deactive($id)
    {
        $webcontent = \App\Webcontent::find($id);

        if ($webcontent) {
            $webcontent->status = 0;
            $webcontent->save();
            return redirect()->route('backend.webcontents.index');

        }
        return redirect()->route('backend.webcontents.index');
    }

    public function show($id)
    {
        $webcontent = \App\Webcontent::find($id);

        if ($webcontent) {
            return view('backend.webcontents.show', compact('category'));
        }
        return redirect()->route('backend.webcontents.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->validate($request, [
            'webcontent_type' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $webcontent = \App\Webcontent::find($id);

        $webcontent->webcontent_type = $request->input('webcontent_type');
        $webcontent->title = $request->input('title');
        $webcontent->description = $request->input('description');
        $webcontent->added_by = \Auth::user()->id;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
            $file->move("upload", $fullname);
            $product->image = 'upload/' . $fullname;
        }

        $webcontent->save();
        session()->flash('success', 'Data Update Successfully');
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
        $webcontent = $this->group->find($id);
        if ($webcontent->count()) {
            $webcontent->delete();
            session()->flash('success', 'Selected Group deleted successfully.');
            return redirect()->route('backend.webcontents.index');
        }
        session()->flash('error', 'Selected Group dose not found in database please try after some time.');
        return redirect()->route('backend.webcontents.index');
    }

}