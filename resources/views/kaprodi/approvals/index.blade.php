@extends('layout.master')


@section('contents')

    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Kaprodi</p>
                        <h1 class="h3 mb-1">Daftar Pengajuan Surat</h1>
                    </div>
                </div>
                {{-- <div class="heading-actions">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-file-earmark-plus" aria-hidden="true"></i> Tambahkan User
                    </a>
                </div> --}}
            </div>

            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">
                            <i class="bi bi-clock-history" aria-hidden="true"></i>
                            <span>Semua Pengajuan Surat</span>
                        </h2>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-primary">Semua</a>
                        <a href="#" class="btn btn-sm btn-primary">Tertunda</a>
                        <a href="#" class="btn btn-sm btn-light">Disetujui</a>
                        <a href="#" class="btn btn-sm btn-light">Ditolak</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">NO. PENGAJUAN</th>
                                <th scope="col">TANGGAL PENGAJUAN</th>
                                <th scope="col">NAMA MAHASISWA</th>
                                <th scope="col">NRP</th>
                                <th scope="col">JENIS SURAT</th>
                                <th scope="col">STATUS</th>
                                <th scope="col" class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>

            </section>
        </div>
    </main>
@endsection


