@extends('layout.master')
@section('title', 'Dashboard Manager / TU')

@section('contents')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Manager / Tata Usaha</p>
                        <h1 class="h3 mb-1">Dashboard</h1>
                        <p class="text-muted mb-0">Pantau surat yang perlu digenerate atau diupload.</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a href="{{ route('manager.letters.index') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-file-earmark-check" aria-hidden="true"></i> Kelola Surat
                    </a>
                </div>
            </div>

            {{-- Stats --}}
            <section class="row g-3 mt-1" aria-label="Statistik surat">
                <div class="col-12 col-sm-6 col-xl-4">
                    <article class="metric-card metric-warning">
                        <div class="metric-top">
                            <span class="metric-label">Perlu Diproses</span>
                            <span class="metric-icon"><i class="bi bi-hourglass-split" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $stats['perlu_diproses'] }}</div>
                        <div class="metric-meta"><span>sudah approve, belum generate</span></div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-xl-4">
                    <article class="metric-card metric-success">
                        <div class="metric-top">
                            <span class="metric-label">Sudah Digenerate</span>
                            <span class="metric-icon"><i class="bi bi-check-circle" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $stats['sudah_generate'] }}</div>
                        <div class="metric-meta"><span>surat tersedia</span></div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-xl-4">
                    <article class="metric-card metric-primary">
                        <div class="metric-top">
                            <span class="metric-label">Total Surat</span>
                            <span class="metric-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $stats['total'] }}</div>
                        <div class="metric-meta"><span>semua pengajuan</span></div>
                    </article>
                </div>
            </section>

            {{-- Tabel perlu diproses --}}
            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">
                            <i class="bi bi-file-earmark-arrow-up" aria-hidden="true"></i>
                            <span>Surat Perlu Diproses</span>
                        </h2>
                        <p class="text-muted mb-0">Pengajuan yang sudah disetujui Kaprodi.</p>
                    </div>
                    <a href="{{ route('manager.letters.index') }}" class="btn btn-outline-secondary btn-sm">
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
                                <th>Program Studi</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent as $item)
                                <tr>
                                    <td class="fw-semibold">{{ $item->submission_number }}</td>
                                    <td>
                                        <p class="fw-semibold mb-0">{{ $item->student?->name }}</p>
                                        <p class="text-muted small mb-0">{{ $item->student?->nim_nik }}</p>
                                    </td>
                                    <td>{{ $item->letterType->name }}</td>
                                    <td>{{ $item->prodi->nama }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('manager.letters.generate', $item) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="bi bi-magic"></i> Generate
                                            </button>
                                        </form>
                                        <a href="{{ route('manager.letters.preview', $item) }}" target="_blank"
                                            class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Preview
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                        Tidak ada surat yang perlu diproses.
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
