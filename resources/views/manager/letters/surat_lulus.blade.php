<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body>

{{-- ======= HALAMAN 1: SURAT KETERANGAN LULUS ======= --}}
<div class="page">

  @include('manager.letters._kop')

  @php
    $tanggalLulus = $details['tanggal_lulus'] ?? '2026-02-09';
  @endphp

  <div class="center bold underline mt-4" style="font-size:13pt;">SURAT KETERANGAN LULUS</div>
  <div class="center bold" style="font-size:12pt;">No. {{ $submission->submission_number }}</div>

  <p class="mt-4">Yang bertanda tangan dibawah ini :</p>

  <table class="body-table">
    <tr>
      <td class="label-col">Nama</td>
      <td class="colon-col">:</td>
      <td>{{ $kaprodi?->name ?? 'Sendy Ferdian Sujadi, S.Kom., M.T.' }}</td>
    </tr>
    <tr>
      <td>Nik</td>
      <td>:</td>
      <td>{{ $kaprodi?->nim_nik ?? '730001' }}</td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td>:</td>
      <td>
        Ketua Program Sarjana {{ $prodi->nama }}<br>
        Fakultas Teknologi dan Rekayasa Cerdas<br>
        Universitas Kristen Maranatha Bandung
      </td>
    </tr>
  </table>

  <p class="mt-4">Dengan ini menerangkan bahwa yang namanya tertera dibawah ini :</p>

  <table class="body-table">
    <tr>
      <td class="label-col">Nama</td>
      <td class="colon-col">:</td>
      <td>{{ $student->name ?? 'ELLENA' }}</td>
    </tr>
    <tr>
      <td>NRP</td>
      <td>:</td>
      <td>{{ $student->nim_nik ?? '2273022' }}</td>
    </tr>
    <tr>
      <td>Tempat/Tgl Lahir</td>
      <td>:</td>
      <td>{{ $details['tempat_lahir'] ?? 'Bandung' }} / {{ \Carbon\Carbon::parse($details['tanggal_lahir'] ?? '2004-06-15')->translatedFormat('d F Y') }}</td>
    </tr>
    <tr>
      <td>Program Pendidikan Tinggi</td>
      <td>:</td>
      <td>Sarjana</td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td>:</td>
      <td>{{ $prodi->nama }}</td>
    </tr>
    <tr>
      <td>Kode Universitas</td>
      <td>:</td>
      <td>041007</td>
    </tr>
    <tr>
      <td>IPK</td>
      <td>:</td>
      <td>{{ $details['ipk'] ?? '3.88' }}</td>
    </tr>
  </table>

  <p class="mt-4">
    Pada tanggal <strong>{{ \Carbon\Carbon::parse($tanggalLulus)->translatedFormat('d F Y') }}</strong>
    yang bersangkutan telah dinyatakan <strong class="underline">LULUS</strong> sebagai Sarjana Komputer (S.Kom.)
    pada Program Sarjana {{ $prodi->nama }} Fakultas Teknologi dan Rekayasa Cerdas
    Universitas Kristen Maranatha.
  </p>

  <p>Demikian agar yang berkepentingan menjadi maklum dan surat ini dapat dipergunakan sebagaimana mestinya.</p>

  @include('manager.letters._ttd')

</div>

{{-- ======= HALAMAN 2: TRANSKRIP NILAI ======= --}}
<div class="page" style="page-break-before: always;">

  @include('manager.letters._kop')

  <div class="center bold mt-4" style="font-size:14pt; letter-spacing:2px;">LAPORAN HASIL STUDI MAHASISWA</div>

  <table class="body-table mt-4" style="width:70%;">
    <tr>
      <td class="label-col">Nama</td>
      <td class="colon-col">:</td>
      <td>{{ $student->name ?? 'ELLENA' }}</td>
    </tr>
    <tr>
      <td>Tempat/Tanggal Lahir</td>
      <td>:</td>
      <td>{{ $details['tempat_lahir'] ?? 'BANDUNG' }}/{{ \Carbon\Carbon::parse($details['tanggal_lahir'] ?? '2004-06-15')->translatedFormat('d F Y') }}</td>
    </tr>
    <tr>
      <td>NRP</td>
      <td>:</td>
      <td>{{ $student->nim_nik ?? '2273022' }}</td>
    </tr>
    <tr>
      <td>Program Pendidikan Tinggi</td>
      <td>:</td>
      <td>Sarjana</td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td>:</td>
      <td>{{ $prodi->nama }} (57201)</td>
    </tr>
    <tr>
      <td>Kode Universitas</td>
      <td>:</td>
      <td>041007</td>
    </tr>
  </table>

  {{-- Tabel Mata Kuliah --}}
  <table style="width:100%; border-collapse:collapse; margin-top:16px; font-size:10pt;">
    <thead>
      <tr style="border-top:2px solid #000; border-bottom:1px solid #000;">
        <th style="padding:4px; text-align:left;">KODE</th>
        <th style="padding:4px; text-align:left;">MATA KULIAH</th>
        <th style="padding:4px; text-align:center;">H</th>
        <th style="padding:4px; text-align:center;">A</th>
        <th style="padding:4px; text-align:center;">K</th>
        <th style="padding:4px; text-align:center;">M</th>
        <th style="padding:4px; text-align:left; padding-left:20px;">KODE</th>
        <th style="padding:4px; text-align:left;">MATA KULIAH</th>
        <th style="padding:4px; text-align:center;">H</th>
        <th style="padding:4px; text-align:center;">A</th>
        <th style="padding:4px; text-align:center;">K</th>
        <th style="padding:4px; text-align:center;">M</th>
      </tr>
    </thead>
    <tbody>
      {{-- Semester 1 & 5 --}}
      <tr><td colspan="6" style="padding:4px;"><strong>Semester 1</strong></td><td colspan="6" style="padding:4px;"><strong>Semester 5</strong></td></tr>
      <tr>
        <td style="padding:2px 4px;">BI011</td><td style="padding:2px 4px;">BAHASA INDONESIA DAN TEKNIK PELAPORAN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">2</td><td style="padding:2px 4px; text-align:center;">8.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIE01</td><td style="padding:2px 4px;">KERJA PRAKTEK KOMPETENSI 1</td><td style="padding:2px 4px; text-align:center;">B+</td><td style="padding:2px 4px; text-align:center;">3.50</td><td style="padding:2px 4px; text-align:center;">4</td><td style="padding:2px 4px; text-align:center;">14.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIA01</td><td style="padding:2px 4px;">SISTEM INFORMASI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIE02</td><td style="padding:2px 4px;">PEMROGRAMAN WEB</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">4</td><td style="padding:2px 4px; text-align:center;">16.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIA02</td><td style="padding:2px 4px;">PEMROGRAMAN DASAR</td><td style="padding:2px 4px; text-align:center;">B</td><td style="padding:2px 4px; text-align:center;">3.00</td><td style="padding:2px 4px; text-align:center;">4</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIE03</td><td style="padding:2px 4px;">PENGENALAN DATA ENGINEERING</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIA03</td><td style="padding:2px 4px;">STATISTIKA DESKRIPTIF DAN PROBABILITAS</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIE04</td><td style="padding:2px 4px;">BAHASA INGGRIS UNTUK BISNIS</td><td style="padding:2px 4px; text-align:center;">B</td><td style="padding:2px 4px; text-align:center;">3.00</td><td style="padding:2px 4px; text-align:center;">2</td><td style="padding:2px 4px; text-align:center;">6.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIA04</td><td style="padding:2px 4px;">PENGENALAN ENTERPRISE ARCHITECTURE</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIE05</td><td style="padding:2px 4px;">ORGANISASI DAN MANAJEMEN PERUSAHAAN INDUSTRI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">2</td><td style="padding:2px 4px; text-align:center;">8.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIA05</td><td style="padding:2px 4px;">E-BISNIS FUNDAMENTAL DAN MANAJEMEN E-COMMERCE</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIE06</td><td style="padding:2px 4px;">SISTEM OPERASI DAN JARINGAN KOMPUTER</td><td style="padding:2px 4px; text-align:center;">C+</td><td style="padding:2px 4px; text-align:center;">2.50</td><td style="padding:2px 4px; text-align:center;">4</td><td style="padding:2px 4px; text-align:center;">10.00</td>
      </tr>
      <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td>
        <td style="padding:2px 4px; padding-left:20px;">SIB032202373</td><td style="padding:2px 4px;">ETIKA PROFESIONAL DAN PENGEMBANGAN DIRI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">2</td><td style="padding:2px 4px; text-align:center;">8.00</td>
      </tr>

      {{-- Semester 2 & 6 --}}
      <tr><td colspan="6" style="padding:4px;"><strong>Semester 2</strong></td><td colspan="6" style="padding:4px;"><strong>Semester 6</strong></td></tr>
      <tr>
        <td style="padding:2px 4px;">BI033</td><td style="padding:2px 4px;">PENDIDIKAN AGAMA KRISTEN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">2</td><td style="padding:2px 4px; text-align:center;">8.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIF01</td><td style="padding:2px 4px;">PEMROGRAMAN APLIKASI BISNIS</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">4</td><td style="padding:2px 4px; text-align:center;">16.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIB01</td><td style="padding:2px 4px;">STATISTIKA BISNIS</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIF02</td><td style="padding:2px 4px;">KEAMANAN SISTEM INFORMASI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIB02</td><td style="padding:2px 4px;">PROSES BISNIS DAN FUNDAMENTAL ERP</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIF03</td><td style="padding:2px 4px;">PERANCANGAN SISTEM INFORMASI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIB03</td><td style="padding:2px 4px;">ALGORITMA DAN STRUKTUR DATA</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIB04</td><td style="padding:2px 4px;">PEMROGRAMAN BERORIENTASI OBJEK</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">4</td><td style="padding:2px 4px; text-align:center;">16.00</td>
        <td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIB05</td><td style="padding:2px 4px;">MANAJEMEN PROYEK TEKNOLOGI INFORMASI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>

      {{-- Semester 3 & 7 --}}
      <tr><td colspan="6" style="padding:4px;"><strong>Semester 3</strong></td><td colspan="6" style="padding:4px;"><strong>Semester 7</strong></td></tr>
      <tr>
        <td style="padding:2px 4px;">BI044</td><td style="padding:2px 4px;">KEWARGANEGARAAN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">2</td><td style="padding:2px 4px; text-align:center;">8.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BI921</td><td style="padding:2px 4px;">SISTEM PENDUKUNG KEPUTUSAN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIC01</td><td style="padding:2px 4px;">PEMODELAN DAN PENGELOLAAN BASIS DATA</td><td style="padding:2px 4px; text-align:center;">B+</td><td style="padding:2px 4px; text-align:center;">3.50</td><td style="padding:2px 4px; text-align:center;">4</td><td style="padding:2px 4px; text-align:center;">14.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BI922</td><td style="padding:2px 4px;">SISTEM MANAJEMEN PENGETAHUAN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIC02</td><td style="padding:2px 4px;">VISUALISASI DATA</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BI923</td><td style="padding:2px 4px;">MANAJEMEN RESIKO TEKNOLOGI INFORMASI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIC03</td><td style="padding:2px 4px;">MANAJEMEN DAN SISTEM INFORMASI RANTAI PASOKAN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BI924</td><td style="padding:2px 4px;">MANAJEMEN HUBUNGAN PELANGGAN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIC04</td><td style="padding:2px 4px;">PEMASARAN ONLINE</td><td style="padding:2px 4px; text-align:center;">B+</td><td style="padding:2px 4px; text-align:center;">3.50</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">10.50</td>
        <td style="padding:2px 4px; padding-left:20px;">BI925</td><td style="padding:2px 4px;">MANAJEMEN DAN ADMINISTRASI BASIS DATA</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BIC05</td><td style="padding:2px 4px;">SISTEM INFORMASI SUMBER DAYA MANUSIA</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>

      {{-- Semester 4 & 8 --}}
      <tr><td colspan="6" style="padding:4px;"><strong>Semester 4</strong></td><td colspan="6" style="padding:4px;"><strong>Semester 8</strong></td></tr>
      <tr>
        <td style="padding:2px 4px;">BI055</td><td style="padding:2px 4px;">PANCASILA</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">2</td><td style="padding:2px 4px; text-align:center;">8.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIG01</td><td style="padding:2px 4px;">KERJA PRAKTEK KOMPETENSI 2</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">5</td><td style="padding:2px 4px; text-align:center;">20.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BID01</td><td style="padding:2px 4px;">PENGENALAN DATA SCIENCE</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIG02</td><td style="padding:2px 4px;">ANTARMUKA PENGGUNA DAN PENGALAMAN PENGGUNA</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BID02</td><td style="padding:2px 4px;">SISTEM INFORMASI AKUNTANSI DAN KEUANGAN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIG03</td><td style="padding:2px 4px;">KECERDASAN BISNIS</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BID03</td><td style="padding:2px 4px;">PENGENDALIAN DAN AUDIT TEKNOLOGI INFORMASI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIG04</td><td style="padding:2px 4px;">PEMODELAN SISTEM INFORMASI LANJUT</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BID04</td><td style="padding:2px 4px;">TECHNOPRENEURSHIP</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BI927</td><td style="padding:2px 4px;">REKAYASA PROSES BISNIS</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BID05</td><td style="padding:2px 4px;">PEMODELAN SISTEM INFORMASI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BI930</td><td style="padding:2px 4px;">TEKNIK KOMUNIKASI DAN NEGOSIASI</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">3</td><td style="padding:2px 4px; text-align:center;">12.00</td>
      </tr>
      <tr>
        <td style="padding:2px 4px;">BID06</td><td style="padding:2px 4px;">STRATEGI PENELITIAN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">2</td><td style="padding:2px 4px; text-align:center;">8.00</td>
        <td style="padding:2px 4px; padding-left:20px;">BIH01</td><td style="padding:2px 4px;">PROGRAM PENGAYAAN</td><td style="padding:2px 4px; text-align:center;">A</td><td style="padding:2px 4px; text-align:center;">4.00</td><td style="padding:2px 4px; text-align:center;">5</td><td style="padding:2px 4px; text-align:center;">20.00</td>
      </tr>

      {{-- Jumlah --}}
      <tr style="border-top:2px solid #000;">
        <td colspan="12" style="padding:4px;">
          <strong>JUMLAH</strong> &nbsp;&nbsp; K = 144 &nbsp;&nbsp; M = 558.5
        </td>
      </tr>
      <tr>
        <td colspan="12" style="padding:4px;">
          Kredit yang Sudah Ditempuh = 144 &nbsp;&nbsp; <strong>Indeks Prestasi Kumulatif = {{ $details['ipk'] ?? '3.88' }}</strong>
        </td>
      </tr>
    </tbody>
  </table>

  <p style="font-size:9pt; margin-top:8px;">
    A = 4.00 ; B+ = 3.50 ; B = 3.00 ; C+ = 2.50 ; C = 2.00 ; D = 1.00 ; E = 0.00 ; T = 0.00 ; F = 0.00
  </p>
  <p style="font-size:9pt;">
    H = HURUF MUTU ; A = ANGKA MUTU ; K = KREDIT SKS ; M = MUTU (PERKALIAN A & K) ; L = LULUS ; T = TIDAK LULUS
  </p>

  {{-- TTD Transkrip --}}
  <table class="ttd-table mt-8" style="width:100%;">
    <tr>
      <td style="width:60%;"></td>
      <td style="text-align:left;">
        <p>Bandung, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Dekan Fakultas Teknologi dan Rekayasa Cerdas,<br>
        Ub. Ketua Program Studi Sarjana {{ $prodi->nama }}</p>
        <br><br><br>
        <p>{{ $kaprodi?->name ?? 'Sendy Ferdian Sujadi, S.Kom., M.T.' }}</p>
        <p>Dr. Radiant Victor Imbar, S.Kom., M.T.</p>
      </td>
    </tr>
  </table>

</div>

</body>
</html>