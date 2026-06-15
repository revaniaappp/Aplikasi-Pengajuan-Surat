<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filter === 'archived') {
            $query = User::onlyTrashed()->with('prodi');
        } else {
            $query = User::with('prodi');
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->orderBy('name')->get();

        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        // withTrashed supaya user archived tetap bisa diedit
        $user = User::withTrashed()->findOrFail($id);
        $prodis = ProgramStudi::all();

        return view('admin.users.edit', compact('user', 'prodis'));
    }

    public function update(Request $request, $id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role'  => 'required',
        ]);

        $user->update($request->only(['name', 'email', 'role', 'nim_nik', 'prodi_id']));

        return redirect()->route('admin.users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function archive($id)
    {
        if (auth()->id() == $id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Tidak bisa mengarsipkan akun sendiri.');
        }

        $user = User::findOrFail($id);
        $user->delete(); // soft delete

        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil diarsipkan.');
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.users.index', ['filter' => 'archived'])
            ->with('success', 'Pengguna berhasil dipulihkan.');
    }
}
