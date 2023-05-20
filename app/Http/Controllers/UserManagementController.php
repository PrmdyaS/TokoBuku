<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    public function index()
    {
        $User = User::get();
        return view('pages.UserManagement.user-management', compact('User'));
    }

    public function tambah()
    {
        $UserGroup = UserGroup::get();
        return view('pages.UserManagement.user-management-tambah', compact('UserGroup'));
    }

    public function add(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required', 'max:255', 'min:2'],
            'user-group' => ['required'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => [
                'required',
                'email',
                'max:255', Rule::unique('users')
            ],
            'password' => 'required|min:5|max:255',
        ]);
        User::create($attributes);
        return redirect()->route('user-management')->with('success', 'Tambah User Sukses');
    }

    public function edit($id)
    {
        $UserGroup = UserGroup::get();
        $User = User::where('id', $id)->first();
        return view('pages.UserManagement.user-management-edit', compact('User', 'UserGroup'));
    }

    public function update(Request $request, $id)
    {
        $data = User::where('id', $id)->first();
        $oldEmail = $data->email;
        $request->validate([
            'user-group' => ['required'],
            'username' => ['required', 'max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($oldEmail, 'email'),
            ],
        ]);

        if ($request->get('password') == null) {
            $User = [
                'id_users_grup' => $request->get('user-group'),
                'username' => $request->get('username'),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
            ];
            User::where('id', $id)->update($User);
            return redirect()->route('user-management')->with('success', 'Edit User Sukses');
        } else {
            $User = [
                'id_users_grup' => $request->get('user-group'),
                'username' => $request->get('username'),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password'))
            ];
            User::where('id', $id)->update($User);
            return redirect()->route('user-management')->with('success', 'Edit User Sukses');
        }
        
    }
    
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user-management')->with('success', 'Hapus User Sukses');
    }
}