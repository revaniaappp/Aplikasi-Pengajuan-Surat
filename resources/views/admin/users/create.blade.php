@extends('layout.master')

@section('contents')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Administrator</p>
                        <h1 class="h3 mb-1">Tambah Pengguna</h1>
                    </div>
                </div>
                <div class="heading-actions">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">
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
                                <span>Informasi Pengguna</span>
                            </h2>
                        </div>
                        <div class="p-3">
                            <form action="{{ route('admin.users.store') }}" method="POST">
                                @csrf
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td class="text-muted">NRP/NIM Pengguna</td>
                                        <td>
                                            <input type="number" class="form-control @error('nim_nik') is-invalid @enderror"
                                                name="nim_nik" value="{{ old('nim_nik') }}" placeholder="contoh: 111111"
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Nama Pengguna</td>
                                        <td>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" placeholder="contoh: Kokom Markonah"
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Email</td>
                                        <td>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}"
                                                placeholder="contoh: kokommarkonah@maranatha.ac.id" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Password Default</td>
                                        <td>
                                            <input type="text" class="form-control @error('password') is-invalid @enderror"
                                                name="password" value="{{ old('password') }}" placeholder="contoh: 12345678"
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Program Studi</td>
                                        <td>
                                            <select class="form-select" name="prodi_id">
                                                @foreach ($prodi as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Role</td>
                                        <td>
                                            <select class="form-select" name="role">
                                                <option value="mahasiswa">Mahasiswa</option>
                                                <option value="kaprodi">Kaprodi</option>
                                                <option value="tata_usaha">Tata Usaha</option>
                                                <option value="manager">Manager Operasional</option>
                                                <option value="admin">Administrator</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <div class="d-flex gap-2 justify-content-end border-top pt-3 mt-2">
                                    <a href="{{ route('mahasiswa.submissions.index') }}"
                                        class="btn btn-outline-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-person" aria-hidden="true"></i> Create User
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection