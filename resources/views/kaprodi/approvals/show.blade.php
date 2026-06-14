@extends('layout.master')

@section('contents')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Kaprodi</p>
                        <h1 class="h3 mb-1">Detail Pengajuan</h1>
                        <p class="text-muted mb-0">{{ $submission->submission_number }}</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a href="{{ route('kaprodi.approvals.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="row mt-3">

                {{-- Kolom kiri --}}
                <div class="col-12 col-xl-8">

                    {{-- Info Pengajuan --}}
                    <div class="panel mb-3">
                        <div class="panel-header">
                            <h2 class="h5 mb-0 section-title">
                                <i class="bi bi-info-circle"></i>
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
                                    <td class="text-muted">Nama Mahasiswa</td>
                                    <td>{{ $submission->student->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">NIM</td>
                                    <td>{{ $submission->student->nim_nik }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Program Studi</td>
                                    <td>{{ $submission->prodi->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Jenis Surat</td>
                                    <td>{{ $submission->letterType->name }}</td>
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
                                    <tr>
                                        <td class="text-muted">Alasan Penolakan</td>
                                        <td class="text-danger">{{ $submission->rejection_reason }}</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>

                    {{-- Data Tambahan --}}
                    @if ($submission->details->count())
                        <div class="panel mb-3">
                            <div class="panel-header">
                                <h2 class="h5 mb-0 section-title">
                                    <i class="bi bi-card-list"></i>
                                    <span>Data Tambahan</span>
                                </h2>
                            </div>
                            <div class="p-3">
                                <table class="table table-borderless mb-0">
                                    @foreach ($submission->details as $detail)
                                        <tr>
                                            <td class="text-muted" style="width:40%">
                                                @switch($detail->field_key)
                                                    @case('keperluan')
                                                        Keperluan
                                                    @break

                                                    @case('nama_mk')
                                                        Nama Mata Kuliah
                                                    @break

                                                    @case('nama_perusahaan')
                                                        Nama Perusahaan
                                                    @break

                                                    @case('tanggal_lulus')
                                                        Tanggal Lulus
                                                    @break

                                                    @default
                                                        {{ ucfirst(str_replace('_', ' ', $detail->field_key)) }}
                                                @endswitch
                                            </td>
                                            <td>{{ $detail->field_value }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif

                    {{-- Tombol Approve/Reject — hanya tampil jika masih pending --}}
                    {{-- Tombol Approve/Reject — hanya tampil jika masih pending --}}
                    @if ($submission->status === 'pending')
                        <div class="panel">
                            <div class="panel-header">
                                <h2 class="h5 mb-0 section-title">
                                    <i class="bi bi-check2-square"></i>
                                    <span>Keputusan</span>
                                </h2>
                            </div>
                            <div class="p-3 d-flex gap-2">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#modalApprove">
                                    <i class="bi bi-check-circle"></i> Setujui
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalReject">
                                    <i class="bi bi-x-circle"></i> Tolak
                                </button>
                            </div>
                        </div>

                        {{-- Modal Approve --}}
                        <div class="modal fade" id="modalApprove" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title fw-semibold">Setujui Pengajuan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="mb-1">Anda akan menyetujui pengajuan berikut:</p>
                                        <p class="fw-semibold mb-0">{{ $submission->submission_number }}</p>
                                        <p class="text-muted small">{{ $submission->student->name }} &mdash;
                                            {{ $submission->letterType->name }}</p>
                                        <p class="text-muted small mb-0">Tindakan ini tidak dapat dibatalkan.</p>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('kaprodi.approvals.approve', $submission->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="bi bi-check-circle"></i> Ya, Setujui
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Reject --}}
                        <div class="modal fade" id="modalReject" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title fw-semibold">Tolak Pengajuan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="{{ route('kaprodi.approvals.reject', $submission->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <p class="mb-1">Anda akan menolak pengajuan:</p>
                                            <p class="fw-semibold mb-0">{{ $submission->submission_number }}</p>
                                            <p class="text-muted small">{{ $submission->student->name }} &mdash;
                                                {{ $submission->letterType->name }}</p>
                                            <div class="mt-3">
                                                <label for="rejection_reason" class="form-label fw-semibold">
                                                    Alasan Penolakan <span class="text-danger">*</span>
                                                </label>
                                                <textarea name="rejection_reason" id="rejection_reason"
                                                    class="form-control @error('rejection_reason') is-invalid @enderror" rows="3"
                                                    placeholder="Tuliskan alasan penolakan...">{{ old('rejection_reason') }}</textarea>
                                                @error('rejection_reason')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-x-circle"></i> Ya, Tolak
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

                {{-- Kolom kanan: info reviewer --}}
                <div class="col-12 col-xl-4">
                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="h5 mb-0 section-title">
                                <i class="bi bi-person-check"></i>
                                <span>Review</span>
                            </h2>
                        </div>
                        <div class="p-3">
                            @if ($submission->reviewed_at)
                                <p class="text-muted small mb-1">Diputuskan oleh</p>
                                <p class="fw-semibold mb-1">{{ $submission->reviewer->name }}</p>
                                <p class="text-muted small">{{ $submission->reviewed_at->format('d M Y, H:i') }}</p>
                            @else
                                <p class="text-muted small">Belum ada keputusan.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @if ($errors->has('rejection_reason'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new bootstrap.Modal(document.getElementById('modalReject')).show();
            });
        </script>
    @endif
@endsection
