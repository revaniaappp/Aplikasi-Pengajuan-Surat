@extends('layout.master')
@section('title', 'Ajukan Surat')

@section('contents')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-file-earmark-plus" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Mahasiswa</p>
                        <h1 class="h3 mb-1">Ajukan Surat</h1>
                        <p class="text-muted mb-0">Isi form berikut untuk mengajukan surat keterangan.</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a href="{{ route('mahasiswa.submissions.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-left" aria-hidden="true"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-xl-8">
                    <div class="panel">
                        <div class="panel-header">
                            <div>
                                <h2 class="h5 mb-1 section-title">
                                    <i class="bi bi-ui-checks" aria-hidden="true"></i>
                                    <span>Form Pengajuan</span>
                                </h2>
                                <p class="text-muted mb-0">Isi data sesuai jenis surat yang dipilih.</p>
                            </div>
                        </div>

                        <div class="p-3">
                            <form id="form-pengajuan" action="{{ route('mahasiswa.submissions.store') }}" method="POST">
                                @csrf

                                {{-- jenis surat dari DB --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Jenis Surat</label>
                                    <select class="form-select @error('letter_type_id') is-invalid @enderror"
                                            id="jenisSurat"
                                            name="letter_type_id"
                                            onchange="showExtraFields(this.value)">
                                        <option value="" disabled selected>-- Pilih jenis surat --</option>
                                        @foreach ($letterTypes as $type)
                                            <option value="{{ $type->id }}"
                                                {{ old('letter_type_id') == $type->id ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('letter_type_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- field tambahan: surat aktif (id=1) --}}
                                <div id="fields-1" class="extra-fields d-none mb-4">
                                    <label class="form-label fw-semibold">Keperluan</label>
                                    <input type="text"
                                           class="form-control @error('keperluan') is-invalid @enderror"
                                           name="keperluan"
                                           value="{{ old('keperluan') }}"
                                           placeholder="contoh: Pembaruan data BPJS, Beasiswa KIP, dll"
                                           required>
                                    <div class="form-text">Tulis keperluan pengajuan surat ini.</div>
                                    @error('keperluan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- field tambahan: surat pengantar MK (id=2) --}}
                                <div id="fields-2" class="extra-fields d-none">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Nama Mata Kuliah</label>
                                        <input type="text"
                                               class="form-control @error('nama_mk') is-invalid @enderror"
                                               name="nama_mk"
                                               value="{{ old('nama_mk') }}"
                                               placeholder="contoh: Perancangan Basis Data (SIB010202373)"
                                               required>
                                        @error('nama_mk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Nama Perusahaan / Instansi Tujuan</label>
                                        <input type="text"
                                               class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                               name="nama_perusahaan"
                                               value="{{ old('nama_perusahaan') }}"
                                               placeholder="contoh: PT Daya Adicipta Motora"
                                               required>
                                        @error('nama_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- sher --}}
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Nama / Posisi Penerima Surat</label>
                                        <input type="text"
                                               class="form-control @error('nama_penerima') is-invalid @enderror"
                                               name="nama_penerima"
                                               value="{{ old('nama_penerima') }}"
                                               placeholder="contoh: Kepala Divisi Motorcycle Sales Marketing and Logistic"
                                               required>
                                        @error('nama_penerima')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Lokasi Perusahaan</label>
                                        <input type="text"
                                               class="form-control @error('lokasi_perusahaan') is-invalid @enderror"
                                               name="lokasi_perusahaan"
                                               value="{{ old('lokasi_perusahaan') }}"
                                               placeholder="contoh: Bandung, Jakarta, Surabaya"
                                               required>
                                        @error('lokasi_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Anggota Kelompok</label>
                                        <div id="anggota-list">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="anggota[]" placeholder="Nama anggota 1" required>
                                                <input type="number" class="form-control" name="nrp_anggota[]" placeholder="NRP" required>
                                            </div>
                                        </div>
                                        
                                        {{-- Container untuk memunculkan pesan error duplikat --}}
                                        <div id="anggota-error" class="text-danger small mb-2 d-none">
                                            <i class="bi bi-exclamation-circle"></i> <span id="error-text"></span>
                                        </div>

                                        <button type="button" class="btn btn-outline-secondary btn-sm mt-1" onclick="tambahAnggota()">
                                            <i class="bi bi-plus"></i> Tambah Anggota
                                        </button>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Tujuan Surat</label>
                                        <input type="text"
                                               class="form-control @error('tujuan_surat') is-invalid @enderror"
                                               name="tujuan_surat"
                                               value="{{ old('tujuan_surat') }}"
                                               placeholder="contoh: mengambil informasi berupa SOP proses perusahaan"
                                               required>
                                        @error('tujuan_surat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- sher end --}}
                                </div>

                                {{-- field tambahan: surat lulus (id=3) --}}
                                {{-- <div id="fields-3" class="extra-fields d-none mb-4">
                                    <label class="form-label fw-semibold">Tanggal Lulus</label>
                                    <input type="date"
                                           class="form-control @error('tanggal_lulus') is-invalid @enderror"
                                           name="tanggal_lulus"
                                           value="{{ old('tanggal_lulus') }}"
                                           required>
                                    @error('tanggal_lulus')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                {{-- tombol submit --}}
                                <div class="d-flex gap-2 justify-content-end border-top pt-3 mt-2">
                                    <a href="{{ route('mahasiswa.submissions.index') }}"
                                       class="btn btn-outline-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-send" aria-hidden="true"></i> Kirim Pengajuan
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                {{-- info sidebar --}}
                <div class="col-12 col-xl-4">
                    <div class="panel">
                        <div class="panel-header">
                            <div>
                                <h2 class="h5 mb-1 section-title">
                                    <i class="bi bi-info-circle" aria-hidden="true"></i>
                                    <span>Informasi Alur</span>
                                </h2>
                            </div>
                        </div>
                        <div class="p-3">
                            <div class="activity-list">
                                <div class="activity-item">
                                    <span class="activity-dot bg-warning"></span>
                                    <div>
                                        <p class="mb-1 fw-semibold">Menunggu</p>
                                        <p class="text-muted small mb-0">
                                            Setelah dikirim, surat akan ditinjau oleh Ketua Program Studi.
                                        </p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-dot bg-success"></span>
                                    <div>
                                        <p class="mb-1 fw-semibold">Disetujui</p>
                                        <p class="text-muted small mb-0">
                                            Jika disetujui, Tata Usaha akan memproses dan mengupload surat.
                                        </p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-dot bg-primary"></span>
                                    <div>
                                        <p class="mb-1 fw-semibold">Tersedia</p>
                                        <p class="text-muted small mb-0">
                                            Surat siap diunduh di halaman riwayat pengajuan.
                                        </p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <span class="activity-dot bg-danger"></span>
                                    <div>
                                        <p class="mb-1 fw-semibold">Ditolak</p>
                                        <p class="text-muted small mb-0">
                                            Jika ditolak, kamu bisa mengajukan ulang dengan data yang diperbaiki.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
@section('JavaScript')
    <script>
        function showExtraFields(val) {
            document.querySelectorAll('.extra-fields').forEach(el => {
            el.classList.add('d-none');
            
                el.querySelectorAll('input, select, textarea').forEach(input => {
                    input.disabled = true;
                });
            });
            if (val) {
                const target = document.getElementById('fields-' + val);
                if (target) {
                    target.classList.remove('d-none');
                    
                    target.querySelectorAll('input, select, textarea').forEach(input => {
                        input.disabled = false;
                    });
                }
            }
        }

        function tambahAnggota() {
            const list = document.getElementById('anggota-list');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" class="form-control" name="anggota[]" placeholder="Nama anggota" required>
                <input type="number" class="form-control" name="nrp_anggota[]" placeholder="NRP" required>
                <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()">
                    <i class="bi bi-trash"></i>
                </button>
            `;
            list.appendChild(div);
        }

        {{-- restore pilihan setelah validation error --}}
        document.addEventListener('DOMContentLoaded', function () {
            const val = document.getElementById('jenisSurat').value;
            if (val) showExtraFields(val);

        // sher 
    const form = document.getElementById('form-pengajuan');
    const errorContainer = document.getElementById('anggota-error');
    const errorText = document.getElementById('error-text');

    if (!form) return;

    form.addEventListener('submit', function(e) {
        errorContainer.classList.add('d-none');
        errorText.innerText = '';

        const namaInputs = document.querySelectorAll('input[name="anggota[]"]');
        const nrpInputs = document.querySelectorAll('input[name="nrp_anggota[]"]');

        const namaValues = Array.from(namaInputs)
            .filter(input => !input.disabled && input.value.trim() !== '')
            .map(input => input.value.trim().toLowerCase());

        const nrpValues = Array.from(nrpInputs)
            .filter(input => !input.disabled && input.value.trim() !== '')
            .map(input => input.value.trim());

        const uniqueNama = new Set(namaValues);
        const uniqueNrp = new Set(nrpValues);

        let errorMessage = '';

        if (uniqueNama.size !== namaValues.length) {
            errorMessage = 'Terdapat nama anggota yang sama. Silakan periksa kembali.';
        } else if (uniqueNrp.size !== nrpValues.length) {
            errorMessage = 'Terdapat NRP anggota yang sama. Silakan periksa kembali.';
        }

        if (errorMessage !== '') {
            e.preventDefault();
            
            errorText.innerText = errorMessage;
            errorContainer.classList.remove('d-none');
            
            return;
        }
    });
});
// end sher
    </script>
