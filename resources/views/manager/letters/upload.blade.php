@extends('layout.master')
@section('title', 'Upload Surat')

@section('contents')
<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon"><i class="bi bi-upload" aria-hidden="true"></i></span>
                <div>
                    <p class="eyebrow mb-1">Manager / Tata Usaha</p>
                    <h1 class="h3 mb-1">Upload Surat</h1>
                    <p class="text-muted mb-0">Upload file PDF surat yang sudah dibuat.</p>
                </div>
            </div>
            <div class="heading-actions">
                <a href="{{ route('manager.letters.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left" aria-hidden="true"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-xl-8">
                <div class="panel">
                    <div class="panel-header">
                        <div>
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-file-earmark-pdf" aria-hidden="true"></i>
                                <span>Form Upload</span>
                            </h2>
                        </div>
                    </div>

                    <div class="p-3">
                        <form action="{{ route('manager.letters.store', $submission->id) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label fw-semibold">File Surat (PDF)</label>
                                <input type="file"
                                       class="form-control @error('file') is-invalid @enderror"
                                       name="file"
                                       accept=".pdf">
                                <div class="form-text">Format PDF, maksimal 5MB.</div>
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2 justify-content-end border-top pt-3 mt-2">
                                <a href="{{ route('manager.letters.index') }}"
                                   class="btn btn-outline-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-upload" aria-hidden="true"></i> Upload Surat
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- info pengajuan --}}
            <div class="col-12 col-xl-4">
                <div class="panel">
                    <div class="panel-header">
                        <div>
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-info-circle" aria-hidden="true"></i>
                                <span>Detail Pengajuan</span>
                            </h2>
                        </div>
                    </div>
                    <div class="p-3">
                        <table class="table table-sm mb-0">
                            <tr>
                                <td class="text-muted">No. Pengajuan</td>
                                <td class="fw-semibold">{{ $submission->submission_number }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Mahasiswa</td>
                                <td class="fw-semibold">{{ $submission->student->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">NIM</td>
                                <td>{{ $submission->student->nim_nik }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Jenis Surat</td>
                                <td>{{ $submission->letterType->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Program Studi</td>
                                <td>{{ $submission->prodi->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Tanggal Ajuan</td>
                                <td>{{ $submission->created_at->format('d M Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection