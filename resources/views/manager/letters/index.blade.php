@extends('layout.master')
@section('title', 'Daftar Surat Disetujui')

@section('contents')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-file-earmark-check" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Manager / Tata Usaha</p>
                        <h1 class="h3 mb-1">Surat Perlu Diproses</h1>
                        <p class="text-muted mb-0">Daftar pengajuan yang sudah disetujui Kaprodi.</p>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">
                            <i class="bi bi-list-check" aria-hidden="true"></i>
                            <span>Pengajuan Disetujui</span>
                        </h2>
                        <p class="text-muted mb-0">Total {{ $submissions->count() }} surat menunggu diproses.</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>No. Pengajuan</th>
                                <th>Mahasiswa</th>
                                <th>Jenis Surat</th>
                                <th>Program Studi</th>
                                <th>Tanggal Ajuan</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($submissions as $item)
                                <tr>
                                    <td>
                                        <p class="fw-semibold mb-0">{{ $item->submission_number }}</p>
                                        <p class="text-muted small mb-0">{{ $item->created_at->format('d M Y, H:i') }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-semibold mb-0">{{ $item->student->name }}</p>
                                        <p class="text-muted small mb-0">{{ $item->student->nim_nik }}</p>
                                    </td>
                                    <td>{{ $item->letterType->name }}</td>
                                    <td>{{ $item->prodi->nama }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    {{-- <td>
                                        @if ($item->status == 'approved')
                                            <span class="badge bg-warning text-dark">
                                                Belum Generate
                                            </span>
                                        @elseif ($item->status == 'available')
                                            <span class="badge bg-success">
                                                Sudah Generate
                                            </span>
                                        @endif
                                    </td> --}}
                                    <td class="text-end">

                                        @if ($item->status == 'approved')
                                            <form action="{{ route('manager.letters.generate', $item) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button class="btn btn-sm btn-primary" title="Generate">
                                                    <i class="bi bi-magic"> Generate</i>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('manager.letters.preview', $item) }}" target="_blank"
                                                class="btn btn-sm btn-info" title="Preview">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('manager.letters.download', $item) }}"
                                                class="btn btn-sm btn-success" title="Download">
                                                <i class="bi bi-download"></i>
                                            </a>

                                            <a href="{{ route('manager.letters.upload', $item) }}"
                                                class="btn btn-sm btn-secondary" title="Upload">
                                                <i class="bi bi-upload"></i>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
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
