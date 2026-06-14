@extends('layout.master')

@section('contents')

    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Mahasiswa</p>
                        <h1 class="h3 mb-1">Riwayat Pengajuan Surat</h1>
                    </div>
                </div>
                <div class="heading-actions">
                    <a href="{{ route('mahasiswa.submissions.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-file-earmark-plus" aria-hidden="true"></i> Ajukan Surat
                    </a>
                </div>
            </div>

            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">
                            <i class="bi bi-clock-history" aria-hidden="true"></i>
                            <span>Semua Pengajuan</span>
                        </h2>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('mahasiswa.submissions.index') }}"
                            class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-light' }}">
                            Semua
                        </a>
                        <a href="{{ route('mahasiswa.submissions.index', ['status' => 'pending']) }}"
                            class="btn btn-sm {{ request('status') === 'pending' ? 'btn-warning' : 'btn-light' }}">
                            Menunggu
                        </a>
                        <a href="{{ route('mahasiswa.submissions.index', ['status' => 'approved']) }}"
                            class="btn btn-sm {{ request('status') === 'approved' ? 'btn-success' : 'btn-light' }}">
                            Disetujui
                        </a>
                        <a href="{{ route('mahasiswa.submissions.index', ['status' => 'available']) }}"
                            class="btn btn-sm {{ request('status') === 'available' ? 'btn-primary' : 'btn-light' }}">
                            Tersedia
                        </a>
                        <a href="{{ route('mahasiswa.submissions.index', ['status' => 'rejected']) }}"
                            class="btn btn-sm {{ request('status') === 'rejected' ? 'btn-danger' : 'btn-light' }}">
                            Ditolak
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No. Pengajuan</th>
                                <th scope="col">Jenis Surat</th>
                                <th scope="col">Program Studi</th>
                                <th scope="col">Tanggal Ajuan</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($submissions as $item)
                                <tr>
                                    <td>
                                        <p class="fw-semibold mb-0">{{ $item->submission_number }}</p>
                                        <p class="text-muted small mb-0">
                                            {{ $item->created_at->format('d M Y, H:i') }}</p>
                                    </td>
                                    <td>{{ $item->letterType->name }}</td>
                                    <td>{{ $item->prodi->nama }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case('pending')
                                                <span class="badge text-bg-warning">Menunggu</span>
                                            @break

                                            @case('approved')
                                                <span class="badge text-bg-success">Disetujui</span>
                                            @break

                                            @case('rejected')
                                                <span class="badge text-bg-danger">Ditolak</span>
                                            @break

                                            @case('available')
                                                <span class="badge text-bg-primary">Tersedia</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-1">
                                            <a href="{{ route('mahasiswa.submissions.show', $item->id) }}"
                                                class="btn btn-light btn-sm">
                                                Detail
                                            </a>
                                            @if ($item->status === 'available')
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-download" aria-hidden="true"></i> Unduh
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-5">
                                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                            Belum ada pengajuan surat.
                                            <a href="{{ route('mahasiswa.submissions.create') }}" class="d-block mt-2">
                                                Ajukan sekarang
                                            </a>
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
