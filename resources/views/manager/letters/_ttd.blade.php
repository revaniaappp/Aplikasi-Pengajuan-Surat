<div class="mt-8">
  <table class="ttd-table">
    <tr>
      <td style="width:50%;"></td>
      <td>
        Bandung, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
        Hormat kami,
      </td>
    </tr>
  </table>
  <table class="ttd-table">
    <tr>
      <td style="width:50%;"></td>
      <td class="mt-16" style="padding-top:64px;">
        <div class="bold">{{ $kaprodi?->name ?? '-' }}</div>
        <div>Ketua Program Studi {{ $prodi->nama }}</div>
      </td>
    </tr>
  </table>
</div>