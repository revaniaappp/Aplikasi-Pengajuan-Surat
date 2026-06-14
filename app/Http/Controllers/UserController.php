<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('prodi')
            ->where('prodi_id', Auth::user()->prodi_id);

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->orderBy('name')->get();

        return view('kaprodi.users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }
}