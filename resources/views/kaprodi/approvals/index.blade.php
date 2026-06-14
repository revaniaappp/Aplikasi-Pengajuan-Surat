@extends('layout.master')

@section('contents')
<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon">
                    <i class="bi bi-file-earmark-check" aria-hidden="true"></i>
                </span>
                <div>
                    <p class="eyebrow mb-1">Kaprodi</p>
                    <h1 class="h3 mb-1">Daftar Pengajuan Surat</h1>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <section class="panel mt-3">

            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title">
                        <i class="bi bi-clock-history"></i>
                        <span>Semua Pengajuan</span>
                    </h2>
                </div>
            </div>

            {{-- FILTER --}}
            <div class="p-3 border-bottom">
                <form method="GET" class="row g-2">

                    <div class="col-md-4">
                        <select name="letter_type_id" class="form-select">
                            <option value="">Semua Jenis Surat</option>

                            @foreach($letterTypes as $type)
                                <option
                                    value="{{ $type->id }}"
                                    {{ request('letter_type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="pending"
                                {{ request('status') == 'pending' ? 'selected' : '' }}>
                                Menunggu
                            </option>
                            <option value="approved"
                                {{ request('status') == 'approved' ? 'selected' : '' }}>
                                Disetujui
                            </option>
                            <option value="rejected"
                                {{ request('status') == 'rejected' ? 'selected' : '' }}>
                                Ditolak
                            </option>

                        </select>
                    </div>

                    <div class="col-md-4 d-flex gap-2">

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-funnel"></i>
                            Filter
                        </button>

                        <a href="{{ route('kaprodi.approvals.index') }}"
                            class="btn btn-secondary">
                            Reset
                        </a>

                    </div>

                </form>
            </div>

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead>
                        <tr>
                            <th>NO. PENGAJUAN</th>
                            <th>TANGGAL</th>
                            <th>NAMA MAHASISWA</th>
                            <th>NIM</th>
                            <th>JENIS SURAT</th>
                            <th>STATUS</th>
                            <th class="text-center">RINCIAN</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($submissions as $item)

                            <tr>

                                <td>
                                    <p class="fw-semibold mb-0">
                                        {{ $item->submission_number }}
                                    </p>
                                </td>

                                <td>
                                    {{ $item->created_at->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $item->student->name }}
                                </td>

                                <td>
                                    {{ $item->student->nim_nik }}
                                </td>

                                <td>
                                    {{ $item->letterType->name }}
                                </td>

                                <td>

                                    @switch($item->status)

                                        @case('pending')
                                            <span class="badge text-bg-warning">
                                                Menunggu
                                            </span>
                                        @break

                                        @case('approved')
                                            <span class="badge text-bg-success">
                                                Disetujui
                                            </span>
                                        @break

                                        @case('rejected')
                                            <span class="badge text-bg-danger">
                                                Ditolak
                                            </span>
                                        @break

                                        @case('available')
                                            <span class="badge text-bg-primary">
                                                Tersedia
                                            </span>
                                        @break

                                    @endswitch

                                </td>

                                {{-- DETAIL --}}
                                <td class="text-center">

                                    <a href="{{ route('kaprodi.approvals.show', $item->id) }}"
                                        class="btn btn-info btn-sm">

                                        Detail

                                    </a>

                                </td>

                                {{-- AKSI --}}
                                <td class="text-center">

                                    @if($item->status === 'pending')

                                        {{-- SETUJUI --}}
                                        <form
                                            action="{{ route('kaprodi.approvals.approve', $item->id) }}"
                                            method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="btn btn-success btn-sm"
                                                onclick="return confirm('Setujui pengajuan ini?')">

                                                Setujui

                                            </button>

                                        </form>

                                        {{-- TOLAK --}}
                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#rejectModal{{ $item->id }}">
                                            Tolak
                                        </button>
                                        <div class="modal fade"
                                            id="rejectModal{{ $item->id }}"
                                            tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form
                                                        action="{{ route('kaprodi.approvals.reject', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Tolak Pengajuan
                                                            </h5>
                                                            <button
                                                                type="button"
                                                                class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Mahasiswa:
                                                                <strong>{{ $item->student->name }}</strong>
                                                            </p>
                                                            <div class="mb-3">
                                                                <label class="form-label">
                                                                    Alasan Penolakan
                                                                </label>
                                                                <textarea
                                                                    name="rejection_reason"
                                                                    class="form-control"
                                                                    rows="4"
                                                                    required
                                                                    placeholder="Tuliskan alasan penolakan..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button
                                                                type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Batal
                                                            </button>
                                                            <button
                                                                type="submit"
                                                                class="btn btn-danger">
                                                                Konfirmasi Tolak
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            <span class="text-muted">
                                                -
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-5">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    Tidak ada pengajuan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</main>
@endsection