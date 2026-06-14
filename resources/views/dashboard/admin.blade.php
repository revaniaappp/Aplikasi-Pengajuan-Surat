@extends('layout.master')
@section('title', 'Dashboard Admin')

@section('contents')
<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        <div class="page-heading">
            <div class="page-heading-copy">
                <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                <div>
                    <p class="eyebrow mb-1">Administrator</p>
                    <h1 class="h3 mb-1">Dashboard</h1>
                    <p class="text-muted mb-0">Kelola pengguna dan pantau sistem.</p>
                </div>
            </div>
            <div class="heading-actions">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-people"></i> Kelola Pengguna
                </a>
            </div>
        </div>

        <section class="row g-3 mt-1">
            <div class="col-12 col-sm-6 col-xl-3">
                <article class="metric-card metric-primary">
                    <div class="metric-top">
                        <span class="metric-label">Total Pengguna</span>
                        <span class="metric-icon"><i class="bi bi-people"></i></span>
                    </div>
                    <div class="metric-value">{{ $stats['total_users'] }}</div>
                    <div class="metric-meta"><span>semua role</span></div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <article class="metric-card metric-success">
                    <div class="metric-top">
                        <span class="metric-label">Total Mahasiswa</span>
                        <span class="metric-icon"><i class="bi bi-person-badge"></i></span>
                    </div>
                    <div class="metric-value">{{ $stats['total_mahasiswa'] }}</div>
                    <div class="metric-meta"><span>terdaftar</span></div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <article class="metric-card metric-warning">
                    <div class="metric-top">
                        <span class="metric-label">Total Pengajuan</span>
                        <span class="metric-icon"><i class="bi bi-file-earmark-text"></i></span>
                    </div>
                    <div class="metric-value">{{ $stats['total_surat'] }}</div>
                    <div class="metric-meta"><span>semua pengajuan</span></div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <article class="metric-card metric-success">
                    <div class="metric-top">
                        <span class="metric-label">Surat Tersedia</span>
                        <span class="metric-icon"><i class="bi bi-file-earmark-check"></i></span>
                    </div>
                    <div class="metric-value">{{ $stats['total_approved'] }}</div>
                    <div class="metric-meta"><span>sudah digenerate</span></div>
                </article>
            </div>
        </section>

    </div>
</main>
@endsection