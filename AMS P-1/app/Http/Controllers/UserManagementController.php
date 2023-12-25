<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\DataTable;
use App\Models\SettingTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function index()
    {
        $setting_title = SettingTitle::first();

        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            $users = User::all();
        
            return view('user-management.index', compact('setting_title', 'users'));
        } else {
            return redirect()->back();
        }
    }

    public function create()
    {
        $setting_title = SettingTitle::first();

        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            $role_names = Role::all();
            return view('user-management.create', compact('setting_title', 'role_names'));
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_name' => 'required|exists:roles,id',
            'name'=>'required',
            'email' => 'required|email|unique:users,email',
            'phone'=>'required',
            'password'=>'required|min:8|max:30',
            'confirm_password'=>'required|same:password',
        ]);

        if ($validator->passes()) {

            $user = new User;
            $user->role_name = $request->role_name;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->password;
            $user->save();

            session::flash('success', 'User added successfully.');

            return response()->json([
                'status' => true,
                'message' => 'User added successfully.',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function edit($user_id, Request $request)
    {
        $setting_title = SettingTitle::first();

        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            $user = User::find($user_id);

            if ($user == null) {
                return redirect()->route('user-management.index');
            }

            $role_names = Role::all();

            return view('user-management.edit', compact('setting_title', 'user', 'role_names'));
        } else {
            return redirect()->back();
        }
    }

    public function update($user_id, Request $request)
    {
        $user = User::find($user_id);

        if ($user == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $validator = Validator::make($request->all(), [
            'role_name' => 'required|exists:roles,id',
            'name'=>'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone'=>'required',
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'new_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (Hash::check($value, $user->password)) {
                        return $fail(__('The new password must be different from the current password.'));
                    }
                },
                'min:8',
                'max:30',
            ],
            'confirm_password'=>'required|same:new_password',
        ]);

        if ($validator->passes()) {

            $user->role_name = $request->role_name;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->new_password;
            $user->save();

            session::flash('success', 'User updated successfully.');

            return response()->json([
                'status' => true,
                'message' => 'User updated successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($user_id, Request $request)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            $user = User::find($user_id);

            if ($user== null) {
                return response()->json([
                    'status' => false,
                    'notFound' => true
                ]);
            }

            $user->delete();

            session::flash('success', 'User deleted successfully.');

            return redirect()->route('user-management.index');
        } else {
            return redirect()->back();
        }
    }
}
