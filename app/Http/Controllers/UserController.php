<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password' => Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }


    public function show(User $user)
    {
        //return view('admin.user.show',compact('user'));
        return back();
    }


    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        if ($user->id !== 1) {
            $user->update($request->all());
            $user->roles()->sync($request->get('roles'));
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if ($user->id !== 1) {
            $user->delete();
        }

        return back();
    }
}
