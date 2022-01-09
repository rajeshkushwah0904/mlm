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

    public function index(Request $request)
    {
        $users = \App\User::all();
        return view('backend.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $module_permissions = \App\ModulePermission::all();
        return view('backend.users.create', compact('module_permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = \App\User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'mobile' => $request->input('mobile'),
            'role' => $request->input('role'),
        ]);

        $input = $request->all();
        for ($i = 0; $i < count($input['module_id']); $i++) {
            $permission = \App\Permission::create([
                'user_id' => $user->id,
                'role_id' => $input['role_id'][$i],
                'module_id' => $input['module_id'][$i],
                'module_name' => $input['module_name'][$i],
            ]);
            $permission = \App\Permission::find($permission->id);
            if (isset($input['p_index'][$i])) {
                $permission->p_index = 1;
            } else {
                $permission->p_index = 0;
            }

            if (isset($input['p_create'][$i])) {
                $permission->p_create = 1;
            } else {
                $permission->p_create = 0;
            }

            if (isset($input['p_view'][$i])) {
                $permission->p_view = 1;
            } else {
                $permission->p_view = 0;
            }

            if (isset($input['p_edit'][$i])) {
                $permission->p_edit = 1;
            } else {
                $permission->p_edit = 0;
            }

            if (isset($input['p_delete'][$i])) {

                $permission->p_delete = 1;
            } else {
                $permission->p_delete = 0;
            }
            $permission->save();
        }

        return redirect()->route('backend.users.index');
    }

    public function edit(Request $request, $user_id)
    {
        $user = \App\User::find($user_id);
        $module_permissions = \App\ModulePermission::all();
        $permissions = \App\Permission::where('user_id', $user_id)->get();
        return view('backend.users.edit', compact('permissions', 'module_permissions', 'user'));
    }

    public function update(Request $request, $user_id)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $user = \App\User::find($user_id);
        $user->name = $request->input('name');
        $user->mobile = $request->input('mobile');
        $user->save();
        $input = $request->all();

        if (isset($input['permission_id'])) {
            for ($i = 0; $i < count($input['permission_id']); $i++) {
                $permission = \App\Permission::find($input['permission_id'][$i]);

                if ($permission) {
                    if (isset($input['p_index'][$i])) {
                        $permission->p_index = 1;
                    } else {
                        $permission->p_index = 0;
                    }

                    if (isset($input['p_create'][$i])) {
                        $permission->p_create = 1;
                    } else {
                        $permission->p_create = 0;
                    }

                    if (isset($input['p_view'][$i])) {
                        $permission->p_view = 1;
                    } else {
                        $permission->p_view = 0;
                    }

                    if (isset($input['p_edit'][$i])) {
                        $permission->p_edit = 1;
                    } else {
                        $permission->p_edit = 0;
                    }

                    if (isset($input['p_delete'][$i])) {

                        $permission->p_delete = 1;
                    } else {
                        $permission->p_delete = 0;
                    }

                    $permission->save();
                }
            }
        } else {
            for ($i = 0; $i < count($input['module_id']); $i++) {
                $permission = \App\Permission::create([
                    'user_id' => $user->id,
                    'role_id' => $input['role_id'][$i],
                    'module_id' => $input['module_id'][$i],
                    'module_name' => $input['module_name'][$i],
                ]);
                $permission = \App\Permission::find($permission->id);
                if (isset($input['p_index'][$i])) {
                    $permission->p_index = 1;
                } else {
                    $permission->p_index = 0;
                }

                if (isset($input['p_create'][$i])) {
                    $permission->p_create = 1;
                } else {
                    $permission->p_create = 0;
                }

                if (isset($input['p_view'][$i])) {
                    $permission->p_view = 1;
                } else {
                    $permission->p_view = 0;
                }

                if (isset($input['p_edit'][$i])) {
                    $permission->p_edit = 1;
                } else {
                    $permission->p_edit = 0;
                }

                if (isset($input['p_delete'][$i])) {

                    $permission->p_delete = 1;
                } else {
                    $permission->p_delete = 0;
                }
                $permission->save();
            }

        }

        return redirect()->route('backend.users.index');
    }
}