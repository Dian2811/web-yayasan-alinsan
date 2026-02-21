<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('auth.users', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'User baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        if($request->password) { $user->password = Hash::make($request->password); }
        $user->save();
        return back()->with('status', 'Data user berhasil diperbarui!');
    }
}