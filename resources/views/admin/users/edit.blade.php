@extends('layout.master')

@section('contents')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Administrator</p>
                        <h1 class="h3 mb-1">Edit Pengguna</h1>
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

                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td class="text-muted">NRP/NIM Pengguna</td>
                                        <td>
                                            <input type="number" class="form-control @error('nim_nik') is-invalid @enderror"
                                                name="nim_nik" value="{{ $user->nim_nik }}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Nama Pengguna</td>
                                        <td>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ $user->name }}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Email</td>
                                        <td>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ $user->email }}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Password Default</td>
                                        <td>
                                            <input type="text" class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="contoh: 12345678 (min 6 char)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Program Studi</td>
                                        <td>
                                            <select class="form-select" name="prodi_id">
                                                @foreach ($prodi as $item)
                                                    <option value="{{ $item->id }}" {{ old('prodi_id', $user->prodi_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Role</td>
                                        <td>
                                            <select class="form-select @error('role') is-invalid @enderror" name="role"
                                                required>
                                                <option value="mahasiswa" {{ old('role', $user->role) == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                                <option value="kaprodi" {{ old('role', $user->role) == 'kaprodi' ? 'selected' : '' }}>Kaprodi</option>
                                                <option value="tata_usaha" {{ old('role', $user->role) == 'tata_usaha' ? 'selected' : '' }}>Tata Usaha</option>
                                                <option value="manager" {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>Manager Operasional</option>
                                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Adimistrator</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="bi bi-check-circle"></i> Save Changes
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection