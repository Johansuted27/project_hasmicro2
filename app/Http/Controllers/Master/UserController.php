<?php

namespace App\Http\Controllers\Master;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Tampilkan semua pengguna
    public function index()
    {
        $users = User::all();
        return view('master.user.index', compact('users'));
    }

    // Tampilkan form untuk membuat pengguna baru
    public function create()
    {
        $groups = Group::all();
        return view('master.user.create', compact('groups'));
    }

    // Simpan pengguna baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'group_id' => 'required',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }

    // Tampilkan detail pengguna
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('master.user.show', compact('user'));
    }

    // Tampilkan form untuk mengedit pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $groups = Group::all();

        return view('master.user.edit', compact('user','groups'));
    }

    // Perbarui data pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'group_id' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    // Hapus pengguna dari database
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}
