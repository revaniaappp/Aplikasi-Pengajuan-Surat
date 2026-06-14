<?php

namespace App\Services;

use App\Models\LetterSubmission;
use App\Models\StaffPlacement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class LetterGeneratorService
{
    /**
     * Ambil semua data yang dibutuhkan untuk render template
     */
    private function buildViewData(LetterSubmission $submission): array
    {
        $details = $submission->details
            ->pluck('field_value', 'field_key')
            ->toArray();

        $prodi = $submission->prodi;
        $student = $submission->student; // ← tambahkan ini

        $kaprodi = StaffPlacement::with('user')
            ->where('prodi_id', $prodi->id)
            ->where('position_type', 'kaprodi')
            ->where(function ($q) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })
            ->latest('start_date')
            ->first()
            ?->user;

        $manager = StaffPlacement::with('user')
            ->where('prodi_id', $prodi->id)
            ->where('position_type', 'tata_usaha')
            ->where(function ($q) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })
            ->latest('start_date')
            ->first()
            ?->user;

        return compact('submission', 'details', 'prodi', 'kaprodi', 'manager', 'student'); // ← tambah student
    }

    /**
     * Tentukan view template berdasarkan kode jenis surat
     */
    private function resolveView(LetterSubmission $submission): string
    {
        return match ($submission->letterType->code) {
            'AKTIF' => 'manager.letters.surat_aktif',
            'PENGANTAR_MK' => 'manager.letters.surat_izin',
            'LULUS' => 'manager.letters.surat_lulus',

            default => 'manager.letters.surat_aktif',
        };
    }

    /**
     * Generate PDF (return instance, belum disimpan)
     */
    public function generate(LetterSubmission $submission)
    {
        $data = $this->buildViewData($submission);
        $view = $this->resolveView($submission);

        return Pdf::loadView($view, $data)
            ->setPaper('a4', 'portrait');
    }

    /**
     * Generate + simpan ke storage, return path
     */
    public function generateAndSave(LetterSubmission $submission): string
    {
        $pdf = $this->generate($submission);
        $fileName = "letters/surat_{$submission->submission_number}.pdf";

        Storage::disk('public')->put($fileName, $pdf->output());

        return $fileName;
    }
}
