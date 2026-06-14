<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body>
<div class="page">

  @include('manager.letters._kop')

  <div class="center bold underline mt-4" style="font-size:13pt;">SURAT KETERANGAN</div>
  <div class="center bold" style="font-size:12pt;">No. {{ $submission->submission_number }}</div>

  <p class="mt-4">Yang bertanda tangan dibawah ini :</p>

  <table class="body-table">
    <tr>
      <td class="label-col">Nama</td><td class="colon-col">:</td>
      <td>{{ $kaprodi?->name ?? '-' }}</td>
    </tr>
    <tr>
      <td>Nik</td><td>:</td>
      <td>{{ $kaprodi?->nim_nik ?? '-' }}</td>
    </tr>
    <tr>
      <td>Jabatan</td><td>:</td>
      <td>
        Ketua Program Sarjana {{ $prodi->nama }}<br>
        Fakultas Teknologi Informasi dan Rekayasa Cerdas<br>
        Universitas Kristen Maranatha Bandung
      </td>
    </tr>
  </table>

  <p class="mt-4">Dengan ini menerangkan bahwa yang namanya tertera dibawah ini :</p>

  <table class="body-table">
    <tr>
      <td class="label-col">Nama</td><td class="colon-col">:</td>
      <td>{{ $student->name }}</td>
    </tr>
    <tr>
      <td>NRP</td><td>:</td>
      <td>{{ $student->nim_nik }}</td>
    </tr>
    <tr>
      <td>Program Studi</td><td>:</td>
      <td>S1-{{ $prodi->nama }}</td>
    </tr>
  </table>

  <p class="mt-4">
    Adalah benar Mahasiswa Aktif di Program Studi S1-{{ $prodi->nama }}
    Fakultas Teknologi dan Rekayasa Cerdas pada Semester
    {{ $details['semester'] ?? 'Genap' }} {{ $details['tahun_akademik'] ?? '2024/2025' }},
    dan surat ini dibuat atas permohonan yang bersangkutan untuk
    {{ $details['keperluan'] ?? 'pemutakhiran data BPJS' }}.
  </p>

  <p>Demikian agar yang berkepentingan menjadi maklum dan surat ini dapat dipergunakan sebagaimana mestinya.</p>

  @include('manager.letters._ttd')

</div>
</body>
</html>