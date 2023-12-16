<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $objs = User::orderBy('id', 'desc')
            ->get();

        return view('admin.user.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function edit($id)
    {
        $obj = User::findOrFail($id);

        return view('admin.user.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($obj->id)],
            'password' => ['nullable', Rules\Password::defaults()],
            'is_admin' => ['nullable', 'boolean'],
        ]);

        $obj->name = $request->name;
        $obj->username = $request->username;
        if ($request->password) {
            $obj->password = Hash::make($request->password);
        }
        $obj->is_admin = $request->is_admin ? 1 : 0;
        $obj->update();

        return to_route('admin.users.index')
            ->with([
                'success' => 'User updated!'
            ]);
    }


    public function destroy($id)
    {
        $obj = User::findOrFail($id);
        $obj->delete();

        return to_route('admin.users.index')
            ->with([
                'success' => 'User deleted!'
            ]);
    }
}
