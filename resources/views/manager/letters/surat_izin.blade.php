<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>

    <div class="page">

        @include('manager.letters._kop')

        <table class="body-table" style="margin-top:20px;">
            <tr>
                <td>Bandung, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
            </tr>
        </table>

        <table class="body-table" style="margin-top:10px;">
            <tr>
                <td class="label-col">No.</td>
                <td class="colon-col">:</td>
                <td>{{ $submission->submission_number }}</td>
            </tr>

            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>Permohonan Ijin</td>
            </tr>

            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td>Surat Pernyataan</td>
            </tr>
        </table>

        <br>

        <p>Kepada Yth :</p>

        <p>
            {{ $details['tujuan_surat'] ?? '-' }}
        </p>

        <p>
            {{ $details['nama_perusahaan'] ?? '-' }}
        </p>

        <p>
            {{ $details['kota_perusahaan'] ?? '-' }}
        </p>

        <p>Dengan hormat,</p>

        <p style="text-align: justify;">
            Sehubungan dengan adanya mahasiswa kami yang sedang mengerjakan salah satu
            Tugas Kuliah
            <strong>{{ $details['mata_kuliah'] ?? '-' }}</strong>
            di Program Studi
            {{ $prodi->nama }},
            maka bersama surat ini kami mohon kesediaan Bapak/Ibu untuk memberikan
            ijin kepada:
        </p>

        @php
            $anggota = collect($details)->filter(function ($value, $key) {
                return str_starts_with($key, 'anggota_');
            });
        @endphp

        <table width="100%">
            @foreach ($anggota as $index => $value)
                @php
                    // format: Nama|NRP
                    $data = array_map('trim', explode('|', $value));

                    $nama = $data[0] ?? '-';
                    $nrp = $data[1] ?? '-';
                @endphp

                <tr>
                    <td width="80">
                        {{ $loop->iteration }}. Nama
                    </td>

                    <td width="10">:</td>

                    <td>
                        {{ $nama }}
                    </td>
                </tr>

                <tr>
                    <td>
                        &nbsp;&nbsp;&nbsp;NRP
                    </td>

                    <td>:</td>

                    <td>
                        {{ $nrp }}
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="height:8px;"></td>
                </tr>
            @endforeach
        </table>

        <br>

        <p style="text-align: justify;">
            Untuk mengambil informasi berupa SOP proses Perusahaan yang diperlukan
            sehubungan dengan Tugas Kuliah tersebut. Adapun batasan materi dan
            dokumen yang diberikan kepada mahasiswa kami, dapat ditentukan oleh
            pihak perusahaan setempat.
        </p>

        <p style="text-align: justify;">
            Demikian surat permohonan ijin ini kami sampaikan, terima kasih
            sebesar-besarnya atas bantuan dan perhatiannya.
        </p>

        @include('manager.letters._ttd')

    </div>

</body>

</html>
