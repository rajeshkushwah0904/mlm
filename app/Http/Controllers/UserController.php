<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\Hash;
use Cookie;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
     public function changepasswordpost(Request $request) {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'renew_password' => 'required|same:new_password'
        ]);
        $user = \Auth::user();
        $user->update([
            'password' => \Hash::make($request->input('new_password')),
        ]);
        session()->flash('success', 'Your Password is Change Successfully');
        return redirect()->route('backend.dashboard');
    }
}