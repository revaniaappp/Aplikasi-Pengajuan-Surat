<?php

namespace App\Http\Controllers;

use App\Models\LetterFile;
use App\Models\LetterSubmission;
use App\Services\LetterGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function __construct(private LetterGeneratorService $generator) {}

    public function index(Request $request)
    {
        $query = LetterSubmission::with(['letterType', 'prodi', 'student'])
            ->whereIn('status', ['approved', 'available']);

        // Filter per prodi kalau TU punya prodi_id
        if (auth()->user()->prodi_id) {
            $query->where('prodi_id', auth()->user()->prodi_id);
        }

        if ($request->search) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('submission_number', 'like', '%'.$keyword.'%')
                    ->orWhereHas('student', function ($q) use ($keyword) {
                        $q->where('name', 'like', '%'.$keyword.'%');
                    });
            });
        }

        $submissions = $query->latest()->paginate(15);

        return view('manager.letters.index', compact('submissions'));
    }

    public function upload(LetterSubmission $submission)
    {
        return view('manager.letters.upload', compact('submission'));
    }

    public function store(Request $request, LetterSubmission $submission)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:5120',
        ]);

        $file = $request->file('file');
        $fileName = str_replace('/', '-', $submission->submission_number).'.pdf';

        $file->storeAs('letters', $fileName, 'public');

        LetterFile::create([
            'submission_id' => $submission->id,
            'file_path' => 'letters/'.$fileName,
            'original_name' => $file->getClientOriginalName(),
            'uploaded_by' => auth()->id(),
            'uploaded_at' => now(),
        ]);

        $submission->update(['status' => 'available']);

        return redirect()->route('manager.letters.index')
            ->with('success', 'Surat berhasil diupload.');
    }

    // Preview di browser
    // Download PDF
    public function download(LetterSubmission $submission)
    {
        $fileName = 'surat_'.str_replace('/', '-', $submission->submission_number).'.pdf';

        return $this->generator->generate($submission)->download($fileName);
    }

    // Preview di browser
    public function preview(LetterSubmission $submission)
    {
        $fileName = 'preview_'.str_replace('/', '-', $submission->submission_number).'.pdf';

        return $this->generator->generate($submission)->stream($fileName);
    }

    // Generate + simpan ke storage
    public function generateAndSave(LetterSubmission $submission)
    {
        abort_unless($submission->status === 'approved', 403);

        $filePath = $this->generator->generateAndSave($submission);

        // Simpan ke tabel letter_files
        LetterFile::updateOrCreate(
            ['submission_id' => $submission->id], // cegah duplikat
            [
                'file_path' => $filePath,
                'original_name' => 'surat_'.str_replace('/', '-', $submission->submission_number).'.pdf',
                'uploaded_by' => auth()->id(),
                'uploaded_at' => now(),
            ]
        );

        $submission->update(['status' => 'available']);

        return redirect()->back()->with('success', 'Surat berhasil digenerate.');
    }
}
