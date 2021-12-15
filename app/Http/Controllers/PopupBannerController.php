<?php

namespace App\Http\Controllers;
use App\PopupBanner;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class PopupBannerController extends Controller
{
      protected $popup_banner;

    public function __construct(PopupBanner $popup_banner)
    {
        $this->popup_banner = $popup_banner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $popup_banners = \App\PopupBanner::all();
        return view('backend.popup_banners.index', compact('popup_banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.popup_banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'popup_name' => 'required',
            'image' => 'required'
        ]);

        $popup_banner = \App\PopupBanner::create([
            'popup_name' => $request->input('popup_name'),
            'status' =>1,
            'added_by' => \Auth::user()->id,
        ]);
        if ($request->file('image')) {
    $file = $request->file('image');
    $filename = $file->getClientOriginalName();
    $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
    $file->move("upload", $fullname);
    $popup_banner->image = 'upload/' . $fullname;
}

        $popup_banner->save();
        session()->flash('success', 'New popup_banner is create Successfully');
        return redirect()->route('backend.popup_banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function active($id)
    {
        $popup_banner = \App\PopupBanner::find($id);

        if ($popup_banner) {
            $popup_banner->status = 1;
            $popup_banner->save();

            return redirect()->route('backend.popup_banners.index');

        }
        return redirect()->route('backend.popup_banners.index');
    }

    public function in_active($id)
    {
        $popup_banner = \App\PopupBanner::find($id);

        if ($popup_banner) {
            $popup_banner->status = 2;
            $popup_banner->save();
            return redirect()->route('backend.popup_banners.index');

        }
        return redirect()->route('backend.popup_banners.index');
    }

    public function show($id)
    {
        $popup_banner = \App\PopupBanner::find($id);

        if ($popup_banner) {
            return view('backend.popup_banners.show', compact('category'));
        }
        return redirect()->route('backend.popup_banners.index');
    }

    public function popup_banner_view($id)
    {
        $popup_banner = \App\PopupBanner::find($id);
        if ($popup_banner) {
            return view('backend.popup_banners.popup_banner_view', compact('popup_banner'));
        }
        return redirect()->route('backend.popup_banners.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $popup_banner = \App\PopupBanner::where('distributor_id', '=', $id)->find($id);
        if ($popup_banner) {
            return view('backend.popup_banners.edit', compact('popup_banner'));
        }
        return redirect()->route('backend.popup_banners.index');
    }

    public function edit_store(Request $request, $id)
    {
       $this->validate($request, [
    'popup_name' => 'required',
    'image' => 'required',
    'status' => 'required',
    'added_by' => 'required',
]);


        $popup_banner = \App\PopupBanner::find($id);
        $popup_banner->popup_name = $request->input('popup_name');
      if ($request->file('image')) {
    $file = $request->file('image');
    $filename = $file->getClientOriginalName();
    $fullname = Str::slug(Str::random(16) . $filename) . '.' . $file->getClientOriginalExtension();
    $file->move("upload", $fullname);
    $popup_banner->image = 'upload/' . $fullname;
}
        $popup_banner->save();
        session()->flash('success', 'popup_banner Are Update Succussfully');
        return redirect()->route('backend.popup_banners.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $popup_banner = \App\PopupBanner::find($id);

        if ($popup_banner->count()) {
            $popup_banner->delete();
            session()->flash('success', 'Selected popup_banners deleted successfully.');
            return redirect()->route('backend.popup_banners.index');
        }
        session()->flash('error', 'Selected popup_banners dose not found in database please try after some time.');
        return redirect()->route('backend.popup_banners.index');
    }

}

