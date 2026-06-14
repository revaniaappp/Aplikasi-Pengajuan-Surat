@extends('layout.master')

@section('title', 'Daftar Pengguna')

@section('contents')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Administrator</p>
                        <h1 class="h3 mb-1">Daftar Pengguna</h1>
                    </div>
                </div>
                <div class="heading-actions">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-person-plus" aria-hidden="true"></i> Tambah Pengguna
                    </a>
                </div>
            </div>

            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">
                            <i class="bi bi-people" aria-hidden="true"></i>
                            <span>Pengguna Program Studi</span>
                        </h2>
                    </div>
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('admin.users.index') }}"
                            class="btn btn-sm {{ !request('role') ? 'btn-primary' : 'btn-light' }}">Semua</a>
                        <a href="{{ route('admin.users.index', ['role' => 'mahasiswa']) }}"
                            class="btn btn-sm {{ request('role') === 'mahasiswa' ? 'btn-primary' : 'btn-light' }}">Mahasiswa</a>
                        <a href="{{ route('admin.users.index', ['role' => 'kaprodi']) }}"
                            class="btn btn-sm {{ request('role') === 'kaprodi' ? 'btn-primary' : 'btn-light' }}">Kaprodi</a>
                        <a href="{{ route('admin.users.index', ['role' => 'tata_usaha']) }}"
                            class="btn btn-sm {{ request('role') === 'tata_usaha' ? 'btn-primary' : 'btn-light' }}">Tata
                            Usaha</a>
                        <a href="{{ route('admin.users.index', ['role' => 'manager']) }}"
                            class="btn btn-sm {{ request('role') === 'manager' ? 'btn-primary' : 'btn-light' }}">Manager</a>
                        <a href="{{ route('admin.users.index', ['role' => 'admin']) }}"
                            class="btn btn-sm {{ request('role') === 'admin' ? 'btn-primary' : 'btn-light' }}">Admin</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>NIM / NRP</th>
                                <th>Program Studi</th>
<<<<<<< HEAD
                                <th>Aksi</th>
=======
                                <th>Role</th>
                                <th>Action</th>
>>>>>>> 607040252975b07aceda6462ed2e4b28bc5a6c6d
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class="fw-semibold">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->nim_nik ?? '-' }}</td>
                                    <td>{{ $user->prodi->nama ?? '-' }}</td>
                                    <td>
                                        @switch($user->role)
                                            @case('mahasiswa')
                                                <span class="badge text-bg-primary">Mahasiswa</span>
                                            @break

                                            @case('kaprodi')
                                                <span class="badge text-bg-success">Kaprodi</span>
                                            @break

                                            @case('tu')
                                                <span class="badge text-bg-secondary">TU</span>
                                            @break

                                            @case('manager')
                                                <span class="badge text-bg-warning">Manager</span>
                                            @break

                                            @case('admin')
                                                <span class="badge text-bg-danger">Admin</span>
                                            @break

                                            @default
                                                <span class="badge text-bg-light text-dark">{{ $user->role }}</span>
                                        @endswitch
                                    </td>
<<<<<<< HEAD
                                    <td>{{ $user->prodi->nama ?? '-' }}</td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-light btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.users.archive', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Arsipkan pengguna ini?')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                Arsip
                                            </button>
                                        </form>
=======
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-light btn-sm">
                                                Edit
                                        </a>
>>>>>>> 607040252975b07aceda6462ed2e4b28bc5a6c6d
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-5">
                                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                            Tidak ada pengguna ditemukan.
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
