<?php

namespace App\Http\Controllers;

use App\Models\LetterSubmission;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'mahasiswa') {

            $submissions = LetterSubmission::where('student_id', $user->id)
                ->latest()
                ->get();

            $stats = [
                'total' => $submissions->count(),
                'pending' => $submissions->whereIn('status', ['pending', 'submitted'])->count(),
                'approved' => $submissions->where('status', 'approved')->count(),
                'available' => $submissions->where('status', 'available')->count(),
            ];

            $recent = $submissions->take(5);

            return view('dashboard.mahasiswa', compact('stats', 'recent'));

        } elseif ($user->role === 'kaprodi') {

            $submissions = LetterSubmission::with(['student', 'letterType'])
                ->where('prodi_id', $user->prodi_id)
                ->latest()
                ->get();

            $stats = [
                'total' => $submissions->count(),
                'pending' => $submissions->where('status', 'pending')->count(),
                'approved' => $submissions->whereIn('status', ['approved', 'available'])->count(),
                'rejected' => $submissions->where('status', 'rejected')->count(),
            ];

            $recent = LetterSubmission::with(['student', 'letterType'])
                ->where('is_read', false)
                ->latest();
            $unreadCount = $recent->count();
            $recent = $recent->take(6)->get();

            return view('dashboard.kaprodi', compact('stats', 'recent', 'unreadCount'));

        } elseif ($user->role === 'tata_usaha') {

            // Query dasar dengan filter prodi
            $query = LetterSubmission::with(['student', 'letterType', 'prodi']);

            // Filter per prodi kalau prodi_id tidak null
            if ($user->prodi_id) {
                $query->where('prodi_id', $user->prodi_id);
            }

            $submissions = $query->latest()->get();

            $stats = [
                'perlu_diproses' => $submissions->where('status', 'approved')->count(),
                'sudah_generate' => $submissions->where('status', 'available')->count(),
                'total' => $submissions->whereIn('status', ['approved', 'available'])->count(),
            ];

            // Ambil 5 yang status approved untuk ditampilkan di tabel
            $recent = $submissions->where('status', 'approved')->values()->take(5);

            return view('dashboard.manager', compact('stats', 'recent'));
        } elseif ($user->role === 'admin') {

            $stats = [
                'total_users' => User::count(),
                'total_mahasiswa' => User::where('role', 'mahasiswa')->count(),
                'total_surat' => LetterSubmission::count(),
                'total_approved' => LetterSubmission::where('status', 'available')->count(),
            ];

            return view('dashboard.admin', compact('stats'));
        }

    }
}
