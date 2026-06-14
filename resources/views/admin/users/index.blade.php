@extends('layout.master')

@section('title', 'Daftar Pengguna')

@section('contents')

    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Admin</p>
                        <h1 class="h3 mb-1">Daftar Pengguna</h1>
                    </div>
                </div>
                {{-- <div class="heading-actions">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-file-earmark-plus" aria-hidden="true"></i> Tambahkan User
                    </a> --}}
                </div>
            </div>

            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">
                            <i class="bi bi-clock-history" aria-hidden="true"></i>
                            <span>Semua Pengguna</span>
                        </h2>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-primary">Mahasiswa</a>
                        <a href="#" class="btn btn-sm btn-light">Kaprodi</a>
                        <a href="#" class="btn btn-sm btn-light">Manajer</a>
                        <a href="#" class="btn btn-sm btn-light">Admin</a>
                        <a href="#" class="btn btn-sm btn-light">TU</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">NIM/NRP</th>
                                <th scope="col">Prodi</th>
                                <th scope="col" class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>

            </section>
        </div>
    </main>
@endsection
