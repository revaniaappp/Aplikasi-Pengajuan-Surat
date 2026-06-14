@extends('layout.master')
@section('title', 'Detail Pengajuan')

@section('contents')
<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                <div>
                    <p class="eyebrow mb-1">Mahasiswa</p>
                    <h1 class="h3 mb-1">Detail Pengajuan</h1>
                    <p class="text-muted mb-0">{{ $submission->submission_number }}</p>
                </div>
            </div>
            <div class="heading-actions">
                <a href="{{ route('mahasiswa.submissions.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left" aria-hidden="true"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row mt-3">

            {{-- Kolom kiri: info pengajuan --}}
            <div class="col-12 col-xl-8">

                {{-- Info utama --}}
                <div class="panel mb-3">
                    <div class="panel-header">
                        <h2 class="h5 mb-0 section-title">
                            <i class="bi bi-info-circle" aria-hidden="true"></i>
                            <span>Informasi Pengajuan</span>
                        </h2>
                    </div>
                    <div class="p-3">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td class="text-muted" style="width:40%">No. Pengajuan</td>
                                <td class="fw-semibold">{{ $submission->submission_number }}</td>
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
                                <td>{{ $submission->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Status</td>
                                <td>
                                    @switch($submission->status)
                                        @case('pending')
                                            <span class="badge text-bg-warning">Menunggu</span>
                                        @break
                                        @case('approved')
                                            <span class="badge text-bg-success">Disetujui</span>
                                        @break
                                        @case('rejected')
                                            <span class="badge text-bg-danger">Ditolak</span>
                                        @break
                                        @case('available')
                                            <span class="badge text-bg-primary">Tersedia</span>
                                        @break
                                    @endswitch
                                </td>
                            </tr>
                            @if ($submission->status === 'rejected' && $submission->rejection_reason)
                                <div class="alert alert-danger mt-3 mb-0">
                                    <strong>
                                        <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                        Alasan Penolakan:
                                    </strong>
                                    <br>
                                    {{ $submission->rejection_reason }}
                                </div>
                            @endif
                        </table>
                    </div>
                </div>

                {{-- Data tambahan --}}
                @if ($submission->details->count())
                <div class="panel mb-3">
                    <div class="panel-header">
                        <h2 class="h5 mb-0 section-title">
                            <i class="bi bi-card-list" aria-hidden="true"></i>
                            <span>Data Tambahan</span>
                        </h2>
                    </div>
                    <div class="p-3">
                        <table class="table table-borderless mb-0">
                            @foreach ($submission->details as $detail)
                            <tr>
                                <td class="text-muted" style="width:40%">
                                    @switch($detail->field_key)
                                        @case('keperluan') Keperluan @break
                                        @case('nama_mk') Nama Mata Kuliah @break
                                        @case('nama_perusahaan') Nama Perusahaan @break
                                        @case('tanggal_lulus') Tanggal Lulus @break
                                        @default {{ ucfirst(str_replace('_', ' ', $detail->field_key)) }}
                                    @endswitch
                                </td>
                                <td>{{ $detail->field_value }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                @endif

                @if ($submission->status === 'available' && $submission->file)
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="h5 mb-0 section-title">
                            <i class="bi bi-file-earmark-arrow-down" aria-hidden="true"></i>
                            <span>Surat Tersedia</span>
                        </h2>
                    </div>
                    <div class="p-3 d-flex align-items-center gap-3">
                        <i class="bi bi-file-earmark-pdf fs-2 text-danger"></i>
                        <div class="flex-grow-1">
                            <p class="fw-semibold mb-0">{{ $submission->file->original_name }}</p>
                            <p class="text-muted small mb-0">
                                Diupload {{ \Carbon\Carbon::parse($submission->file->uploaded_at)->format('d M Y, H:i') }}
                            </p>
                        </div>
                        <a href="{{ route('mahasiswa.submissions.download', $submission) }}"
                            class="btn btn-primary">
                                <i class="bi bi-download" aria-hidden="true"></i> Unduh
                            </a>
                    </div>
                </div>
                @endif

            </div>

            {{-- Kolom kanan: timeline status --}}
            <div class="col-12 col-xl-4">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="h5 mb-0 section-title">
                            <i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
                            <span>Alur Status</span>
                        </h2>
                    </div>
                    <div class="p-3">
                        <div class="activity-list">
                            <div class="activity-item">
                                <span class="activity-dot bg-warning"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">Menunggu</p>
                                    <p class="text-muted small mb-0">Ditinjau oleh Ketua Program Studi.</p>
                                </div>
                            </div>
                            <div class="activity-item">
                                <span class="activity-dot bg-success"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">Disetujui</p>
                                    <p class="text-muted small mb-0">Tata Usaha memproses dan mengupload surat.</p>
                                </div>
                            </div>
                            <div class="activity-item">
                                <span class="activity-dot bg-primary"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">Tersedia</p>
                                    <p class="text-muted small mb-0">Surat siap diunduh.</p>
                                </div>
                            </div>
                            <div class="activity-item">
                                <span class="activity-dot bg-danger"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">Ditolak</p>
                                    <p class="text-muted small mb-0">Bisa ajukan ulang dengan data diperbaiki.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection