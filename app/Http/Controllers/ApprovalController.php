<?php

namespace App\Http\Controllers;

use App\Models\LetterSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LetterType;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        $query = LetterSubmission::with([
            'student',
            'letterType',
            'prodi'
        ])->where('prodi_id', Auth::user()->prodi_id);

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter jenis surat
        if ($request->filled('letter_type_id')) {
            $query->where('letter_type_id', $request->letter_type_id);
        }

        // search
if ($request->filled('search')) {

    $search = $request->search;

    $query->where(function ($q) use ($search) {

        $q->where('submission_number', 'like', "%{$search}%")

        ->orWhereRaw("DATE_FORMAT(created_at, '%d %b %Y') LIKE ?", ["%{$search}%"])

        ->orWhereRaw("DATE_FORMAT(created_at, '%Y-%m-%d') LIKE ?", ["%{$search}%"])

        ->orWhereHas('student', function ($student) use ($search) {

            $student->where('name', 'like', "%{$search}%")
                    ->orWhere('nim_nik', 'like', "%{$search}%");

        })

        ->orWhereHas('letterType', function ($type) use ($search) {

            $type->where('name', 'like', "%{$search}%");

        });

    });
}

        $submissions = $query->latest()->get();

        $letterTypes = \App\Models\LetterType::all();

        return view(
            'kaprodi.approvals.index',
            compact('submissions', 'letterTypes')
        );
    }

    public function show(LetterSubmission $submission)
    {
        if ($submission->prodi_id !== Auth::user()->prodi_id) {
            abort(403);
        }

        $submission->load(['student', 'letterType', 'prodi', 'details']);

        return view('kaprodi.approvals.show', compact('submission'));
    }

    public function approve(LetterSubmission $submission)
    {
        if ($submission->prodi_id !== Auth::user()->prodi_id) {
            abort(403);
        }

        $submission->update([
            'status'      => 'approved',
            'reviewed_by' => Auth::id(),
            'reviewed_at' => now(),
            'rejection_reason' => null,
        ]);

        return redirect()->route('kaprodi.approvals.index')
            ->with('success', 'Pengajuan berhasil disetujui.');
    }

    public function reject(Request $request, LetterSubmission $submission)
    {
        if ($submission->prodi_id !== Auth::user()->prodi_id) {
            abort(403);
        }

        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $submission->update([
            'status'           => 'rejected',
            'reviewed_by'      => Auth::id(),
            'reviewed_at'      => now(),
            'rejection_reason' => $request->rejection_reason,
        ]);

        return redirect()->route('kaprodi.approvals.index')
            ->with('success', 'Pengajuan berhasil ditolak.');
    }
}