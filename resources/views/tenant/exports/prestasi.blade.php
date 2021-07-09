<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Kegiatan</th>
            <th>Prestasi</th>
            <th>Tingkat Prestasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prestasi as $pres)
        <tr>
            <td>{{ date('d/m/Y', strtotime($pres->tanggal)) }}</td>
            <td>{{ $pres->jenis_kegiatan }}</td>
            <td>{{ $pres->prestasi }}</td>
            <td>{{ $pres->tingkat_prestasi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>