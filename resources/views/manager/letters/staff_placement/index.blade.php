@extends('layout.master')

@section('title', 'Data Penempatan Staff')

@section('contents')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-envelope-paper" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Tata Usaha</p>
                        <h1 class="h3 mb-1">Struktur Organisasi Prodi Sistem Informasi</h1>
                    </div>
                </div>
                {{-- <div class="heading-actions">
                    <a href="{{ route('manager.staff_placements.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg" aria-hidden="true"></i> Tambah Jenis Surat
                    </a>
                </div> --}}
            </div>

            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">
                            <i class="bi bi-list-ul" aria-hidden="true"></i>
                            <span>Managerial</span>
                        </h2>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Jabatan</th>
                                <th>Nama Staff</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Kaprodi
                                </td>
                                <td>
                                    {{ $kaprodi->nim_nik }}
                                </td>
                                <td>
                                    {{ $kaprodi->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Manager Operasional
                                </td>
                                <td>
                                    {{ $mo->nim_nik }}
                                </td>
                                <td>
                                    {{ $mo->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tata Usaha
                                </td>
                                <td>
                                    {{ $tu->nim_nik }}
                                </td>
                                <td>
                                    {{ $tu->name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- <section class="panel mt-3">
                <div class="panel-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="h5 mb-0 section-title">
                            <i class="bi bi-list-ul" aria-hidden="true"></i>
                            <span>Dosen Wali</span>
                        </h2>
                        <div class="heading-actions">
                            <a href="{{ route('manager.staff_placements.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-lg" aria-hidden="true"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Angkatan Wali</th>
                                <th>Keterangan</th>
                                <th>Nama Dosen</th>
                                <th>Email</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ( as ) --}}
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            {{-- </section> --}} --}}
        </div>
    </main>
@endsection