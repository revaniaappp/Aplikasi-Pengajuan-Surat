<?php

namespace App\Http\Controllers;

use App\Models\LetterSubmission;
use App\Models\LetterType;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = LetterSubmission::where('student_id', auth()->id());

        if ($request->search) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('submission_number', 'like', '%'.$keyword.'%')
                    ->orWhereHas('letterType', function ($q) use ($keyword) {
                        $q->where('name', 'like', '%'.$keyword.'%');
                    });
            });
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $submissions = $query->latest()->paginate(15);

        return view('mahasiswa.submissions.index', compact('submissions'));
    }

    public function create()
    {
        $letterTypes = LetterType::all();

        return view('mahasiswa.submissions.create', compact('letterTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'letter_type_id' => 'required|integer|exists:letter_types,id',
            'keperluan' => 'nullable|string|max:255',
            'nama_mk' => 'nullable|string|max:150',
            'nama_perusahaan' => 'nullable|string|max:150',
            // 'tanggal_lulus' => 'nullable|date',
            'nama_penerima' => 'nullable|string|max:150',
            'lokasi_perusahaan' => 'nullable|string|max:150',
            'tujuan_surat' => 'nullable|string|max:255',

            'anggota' => 'nullable|array',
            'anggota.*' => 'required_with:anggota|string|distinct',
            'nrp_anggota' => 'nullable|array',
            'nrp_anggota.*' => 'required_with:nrp_anggota|numeric|distinct',
        ], [
            'anggota.*.distinct' => 'Nama anggota tidak boleh ada yang sama.',
            'nrp_anggota.*.distinct' => 'NRP tidak boleh ada yang sama.',
        ]);

        // Simpan submission utama
        $submission = LetterSubmission::create([
            'submission_number' => 'SUBM/'.date('Y').'/'.str_pad(LetterSubmission::count() + 1, 3, '0', STR_PAD_LEFT),
            'student_id' => auth()->id(),
            'prodi_id' => auth()->user()->prodi_id,
            'letter_type_id' => $request->letter_type_id,
            'status' => 'pending',
        ]);

        // Simpan field tambahan satu per satu ke submission_details
        if ($request->filled('keperluan')) {
            $submission->details()->create([
                'field_key' => 'keperluan',
                'field_value' => $request->keperluan,
            ]);
        }

        if ($request->filled('nama_mk')) {
            $submission->details()->create([
                'field_key' => 'nama_mk',
                'field_value' => $request->nama_mk,
            ]);
        }

        if ($request->filled('nama_perusahaan')) {
            $submission->details()->create([
                'field_key' => 'nama_perusahaan',
                'field_value' => $request->nama_perusahaan,
            ]);
        }

        if ($request->filled('nama_penerima')) {
            $submission->details()->create([
                'field_key' => 'nama_penerima',
                'field_value' => $request->nama_penerima,
            ]);
        }

        if ($request->filled('lokasi_perusahaan')) {
            $submission->details()->create([
                'field_key' => 'lokasi_perusahaan',
                'field_value' => $request->lokasi_perusahaan,
            ]);
        }

        if ($request->filled('tujuan_surat')) {
            $submission->details()->create([
                'field_key' => 'tujuan_surat',
                'field_value' => $request->tujuan_surat,
            ]);
        }

        // if ($request->filled('tanggal_lulus')) {
        //     $submission->details()->create([
        //         'field_key' => 'tanggal_lulus',
        //         'field_value' => $request->tanggal_lulus,
        //     ]);
        // }

        // Simpan anggota kelompok
        if ($request->anggota) {
            foreach ($request->anggota as $i => $nama) {
                if (empty($nama)) {
                    continue;
                }

                $nrp = $request->nrp_anggota[$i] ?? '';

                $submission->details()->create([
                    'field_key' => 'anggota_'.($i + 1),
                    'field_value' => $nama.' | '.$nrp,
                ]);
            }
        }

        return redirect()->route('mahasiswa.submissions.index')
            ->with('success', 'Pengajuan surat berhasil dikirim.');
    }

    public function show(LetterSubmission $submission)
    {
        if ($submission->student_id !== auth()->id()) {
            abort(403);
        }
        $submission->load(['letterType', 'prodi', 'details', 'file']);

        return view('mahasiswa.submissions.show', compact('submission'));
    }
}
