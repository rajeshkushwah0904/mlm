<?php

namespace App\Http\Controllers;

use App\Reward;
use Illuminate\Http\Request;
use Session;

class RewardController extends Controller
{
    protected $reward;

    public function __construct(Reward $reward)
    {
        $this->reward = $reward;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rewards = \App\Reward::all();
        return view('backend.rewards.index', compact('rewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.rewards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tag' => 'required',
            'criteria' => 'required',
            'cash' => 'required',
            'reward' => 'required',
            'business_amount' => 'required',
        ]);

        $reward = \App\Reward::create([
            'tag' => $request->input('tag'),
            'criteria' => $request->input('criteria'),
            'cash' => $request->input('cash'),
            'reward' => $request->input('reward'),
            'business_amount' => $request->input('business_amount'),
            'updated_by' => \Auth::user()->id,
            'status' => 1,
        ]);
        $reward->save();
        session()->flash('success', 'New Reward is create Successfully');
        return redirect()->route('backend.rewards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function active($id)
    {
        $reward = \App\Reward::find($id);

        if ($reward) {
            $reward->status = 1;
            $reward->save();

            return redirect()->route('backend.rewards.index');

        }
        return redirect()->route('backend.rewards.index');
    }

    public function deactive($id)
    {
        $reward = \App\Reward::find($id);

        if ($reward) {
            $reward->status = 0;
            $reward->save();
            return redirect()->route('backend.rewards.index');

        }
        return redirect()->route('backend.rewards.index');
    }

    public function show($id)
    {
        $reward = \App\Reward::find($id);

        if ($reward) {
            return view('backend.rewards.show', compact('category'));
        }
        return redirect()->route('backend.rewards.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $reward = \App\Reward::find($id);
        if ($reward) {
            return view('backend.rewards.edit', compact('reward'));
        }
        return redirect()->route('backend.rewards.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tag' => 'required',
            'criteria' => 'required',
            'cash' => 'required',
            'reward' => 'required',
            'business_amount' => 'required',
        ]);

        $reward = \App\Reward::find($id);
        $reward->tag = $request->input('tag');
        $reward->criteria = $request->input('criteria');
        $reward->cash = $request->input('cash');
        $reward->reward = $request->input('reward');
        $reward->business_amount = $request->input('business_amount');
        $reward->updated_by = \Auth::user()->id;
        $reward->save();
        session()->flash('success', 'Reward Are Update Succussfully');
        return redirect()->route('backend.rewards.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $reward = $this->reward->find($id);
        if ($reward->count()) {
            $reward->delete();
            session()->flash('success', 'Selected reward deleted successfully.');
            return redirect()->route('backend.rewards.index');
        }
        session()->flash('error', 'Selected reward dose not found in database please try after some time.');
        return redirect()->route('backend.rewards.index');
    }

}