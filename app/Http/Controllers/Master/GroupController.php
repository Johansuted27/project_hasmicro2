<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use Illuminate\Support\Facades\Hash;

class GroupController extends Controller
{
    // Tampilkan semua pengguna
    public function index()
    {
        $groups = Group::with('users')->get();
        return view('master.group.index', compact('groups'));
    }

    // Tampilkan form untuk membuat pengguna baru
    public function create()
    {
        return view('master.group.create');
    }

    // Simpan pengguna baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:groups',
        ]);

        Group::create([
            'name' => $request->name,
        ]);

        return redirect()->route('group.index')->with('success', 'Group created successfully!');
    }

    // Tampilkan detail pengguna
    public function show($id)
    {
        $group = Group::findOrFail($id);
        return view('master.group.show', compact('group'));
    }

    // Tampilkan form untuk mengedit pengguna
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('master.group.edit', compact('group'));
    }

    // Perbarui data pengguna
    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:groups,email,' . $group->id,
        ]);

        $group->update([
            'name' => $request->name,
        ]);

        return redirect()->route('group.index')->with('success', 'Group updated successfully!');
    }

    // Hapus pengguna dari database
    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('group.index')->with('success', 'Group deleted successfully!');
    }

    public function list()
    {
        $groups = Group::with('users')->get();
        return view('master.group.list', compact('groups'));
    }
}
