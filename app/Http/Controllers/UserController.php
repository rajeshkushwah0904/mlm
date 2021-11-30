<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function changepasswordpost(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'renew_password' => 'required|same:new_password',
        ]);
        $user = \App\User::where('distributor_id', '=', $request->distributor_id)->first();
        if ($user) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = \Hash::make($request->input('new_password'));
                $user->save();
                session()->flash('success', 'Your Password is Change Successfully');
                return redirect()->back();

            } else {
                session()->flash('error', 'Old Password Are Incorrect');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Data does not match please try Again');
            return redirect()->back();
        }
    }
}