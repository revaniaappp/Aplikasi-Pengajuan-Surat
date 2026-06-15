<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;

class StaffPlacementController extends Controller
{
    public function index()
    {
        $kaprodi = User::where('role', 'kaprodi')
            ->where('prodi_id', 1)
            ->first();

        $tu = User::where('role', 'tata_usaha')
            ->where('prodi_id', 1)
            ->first();

        $mo = User::where('role', 'manager')
            ->where('prodi_id', 1)
            ->first();

        return view(
            'manager.staff_placements.index',
            compact('placements', 'kaprodi', 'tu', 'mo')
        );
    }

    public function create()
    {
        return view('manager.staff_placements.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'angkatan_wali' => 'required|integer',
            'keterangan_umum' => 'nullable|string|max:255',

            // Validasi Array Dinamis Dosen
            'dosen' => 'required|array',
            'dosen.nama' => 'required|array|min:1',
            'dosen.nama.*' => 'required|string|max:255',
            'dosen.email' => 'required|array|min:1',
            'dosen.email.*' => 'required|email|max:255',
        ], [
            // Pesan Error Kustom
            'angkatan_wali.required' => 'Angkatan Wali wajib diisi.',
            'dosen.nama.*.required' => 'Semua field Nama Dosen wajib diisi.',
            'dosen.email.*.required' => 'Semua field Email wajib diisi.',
            'dosen.email.*.email' => 'Format email yang dimasukkan tidak valid.',
        ]);
        // 2. Ambil data dari request
        $angkatanWali = $request->input('angkatan_wali');
        $keteranganUmum = $request->input('keterangan_umum');
        $dosenList = $request->input('dosen');

        // 3. Susun array untuk Batch Insert
        $dataToInsert = [];

        foreach ($dosenList['nama'] as $index => $namaDosen) {
            $dataToInsert[] = [
                'angkatan_wali' => $angkatanWali,
                'keterangan_umum' => $keteranganUmum,
                'nama_dosen' => $namaDosen,
                // Mengambil email berdasarkan index yang sama dengan nama
                'email' => $dosenList['email'][$index],

                // Jika menggunakan insert(), timestamp harus diisi manual
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // 4. Simpan ke Database
        DosenWali::insert($dataToInsert);

        // 5. Redirect kembali dengan pesan sukses
        return redirect()->route('manager.staff_placements.index')
            ->with('success', 'Data Dosen Wali berhasil ditambahkan.');
    }

    public function edit(DosenWali $DosenWali)
    {
        $users = User::all();
        $prodis = ProgramStudi::all();

        return view(
            'manager.staff_placements.edit',
            compact('DosenWali', 'users', 'prodis')
        );
    }

    public function update(Request $request, DosenWali $DosenWali)
    {
        $request->validate([
            'user_id' => 'required',
            'prodi_id' => 'required',
            'position_type' => 'required',
            'start_date' => 'required|date',
        ]);

        $DosenWali->update([
            'user_id' => $request->user_id,
            'prodi_id' => $request->prodi_id,
            'position_type' => $request->position_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()
            ->route('manager.staff_placements.index')
            ->with('success', 'Data berhasil diperbarui');
    }
}
