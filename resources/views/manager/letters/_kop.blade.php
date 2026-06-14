<style>
    @page {
        margin: 0;
    }

    body {
        font-family: 'Times New Roman', serif;
        font-size: 12pt;
        margin: 0;
        padding: 0;
    }

    .page {
        padding: 1.5cm 2cm 2cm 2.5cm;
    }

    .kop-table {
        width: 100%;
        border-collapse: collapse;
    }

    .kop-table td {
        vertical-align: middle;
        padding: 4px;
    }

    .kop-logo {
        width: 70px;
    }

    .kop-text {
        font-size: 10pt;
        line-height: 1.4;
    }

    .kop-univ {
        font-size: 13pt;
        font-weight: bold;
    }

    .kop-fak {
        font-size: 11pt;
        font-weight: bold;
    }

    .kop-divider {
        border-top: 3px solid #000;
        border-bottom: 1px solid #000;
        margin: 4px 0 16px;
    }

    .kop-address {
        font-size: 8pt;
        text-align: right;
        color: #333;
        line-height: 1.5;
    }

    .body-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 6px;
    }

    .body-table td {
        vertical-align: top;
        padding: 2px 4px;
        font-size: 12pt;
    }

    .label-col {
        width: 140px;
    }

    .colon-col {
        width: 10px;
    }

    p {
        margin: 8px 0;
        line-height: 1.6;
        text-align: justify;
    }

    .bold {
        font-weight: bold;
    }

    .underline {
        text-decoration: underline;
    }

    .center {
        text-align: center;
    }

    .mt-4 {
        margin-top: 16px;
    }

    .mt-8 {
        margin-top: 32px;
    }

    .mt-16 {
        margin-top: 64px;
    }

    .ttd-table {
        width: 100%;
        border-collapse: collapse;
    }

    .ttd-table td {
        vertical-align: top;
        font-size: 12pt;
    }
</style>

<table class="kop-table">
    <tr>
        <td style="width:80px;">
            <img src="{{ public_path('assets/images/png/logo-maranatha.png') }}" class="kop-logo">
        </td>

        <td>
            <div class="kop-univ">
                UNIVERSITAS KRISTEN MARANATHA
            </div>

            <div class="kop-fak">
                Fakultas Teknologi dan Rekayasa Cerdas
            </div>

            <div class="kop-text">
                Program Sarjana {{ $prodi->nama ?? '-' }}
            </div>
        </td>

        <td class="kop-address">
            Jl. Prof. drg. Surya Sumantri, M.P.H. No. 65<br>
            Bandung - 40164, Jawa Barat, Indonesia<br>
            Telp: +62 22-201 2186 / 200 3450, ext. 1740<br>

            @if ($prodi->kode == 'SI')
                Email: infosys.smartech@maranatha.edu<br>
            @elseif($prodi->kode == 'TI')
                Email: if.smarttech@maranatha.edu<br>
            @endif

            www.maranatha.edu
        </td>
    </tr>
</table>

<div class="kop-divider"></div>
