@extends('layout.master')
@section('title', 'Dashboard Kaprodi')

@section('contents')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Ketua Program Studi</p>
                        <h1 class="h3 mb-1">Dashboard</h1>
                        <p class="text-muted mb-0">Pantau pengajuan surat mahasiswa di prodi kamu.</p>
                    </div>
                </div>
            </div>

            {{-- Stats --}}
            <section class="row g-3 mt-1" aria-label="Statistik approval">
                <div class="col-12 col-sm-6 col-xl-3">
                    <article class="metric-card metric-warning">
                        <div class="metric-top">
                            <span class="metric-label">Menunggu Review</span>
                            <span class="metric-icon"><i class="bi bi-hourglass-split" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $stats['pending'] }}</div>
                        <div class="metric-meta"><span>perlu ditinjau</span></div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <article class="metric-card metric-success">
                        <div class="metric-top">
                            <span class="metric-label">Disetujui</span>
                            <span class="metric-icon"><i class="bi bi-check-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $stats['approved'] }}</div>
                        <div class="metric-meta"><span>sudah approve</span></div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <article class="metric-card metric-danger">
                        <div class="metric-top">
                            <span class="metric-label">Ditolak</span>
                            <span class="metric-icon"><i class="bi bi-x-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $stats['rejected'] }}</div>
                        <div class="metric-meta"><span>ditolak</span></div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-xl-3">
                    <article class="metric-card metric-primary">
                        <div class="metric-top">
                            <span class="metric-label">Total Pengajuan</span>
                            <span class="metric-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $stats['total'] }}</div>
                        <div class="metric-meta"><span>semua pengajuan</span></div>
                    </article>
                </div>
            </section>

            {{-- Tabel pending --}}
            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">
                            <i class="bi bi-list-check" aria-hidden="true"></i>
                            <span>Pengajuan Perlu Ditinjau</span>
                        </h2>
                        <p class="text-muted mb-0">5 pengajuan terbaru yang masuk.</p>
                    </div>
                    <a href="{{ route('kaprodi.approvals.index') }}" class="btn btn-outline-secondary btn-sm">
                        Lihat Semua
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>No. Pengajuan</th>
                                <th>Mahasiswa</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent as $item)
                                <tr>
                                    <td class="fw-semibold">{{ $item->submission_number }}</td>
                                    <td>
                                        <p class="fw-semibold mb-0">{{ $item->student->name }}</p>
                                        <p class="text-muted small mb-0">{{ $item->student->nim_nik }}</p>
                                    </td>
                                    <td>{{ $item->letterType->name }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>
                                        @php
                                            $badges = [
                                                'pending' => 'warning',
                                                'submitted' => 'warning',
                                                'approved' => 'success',
                                                'rejected' => 'danger',
                                                'available' => 'primary',
                                            ];
                                            $color = $badges[$item->status] ?? 'secondary';
                                        @endphp
                                        <span
                                            class="badge text-bg-{{ $color }}">{{ ucfirst($item->status) }}</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('kaprodi.approvals.show', $item) }}"
                                            class="btn btn-light btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Tidak ada pengajuan masuk.
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
