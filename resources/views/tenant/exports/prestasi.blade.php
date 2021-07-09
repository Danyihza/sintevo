<table>
    <thead>
        <tr>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Tanggal</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Kegiatan</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Prestasi</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Tingkat Prestasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prestasi as $pres)
        <tr>
            <td align="center" style="border: 1px solid #000000;">{{ date('d/m/Y', strtotime($pres->tanggal)) }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $pres->jenis_kegiatan }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $pres->prestasi }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $pres->tingkat_prestasi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>