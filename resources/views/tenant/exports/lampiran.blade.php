<table>
    <thead>
        <tr>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Tanggal</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Jenis Kegiatan</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Keterangan File</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Feedback</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lampiran as $lamp)
        <tr>
            <td align="center" style="border: 1px solid #000000;">{{ date('d/m/Y', strtotime($lamp->tanggal)) }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $lamp->jenis_kegiatan }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $lamp->keterangan_file }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $lamp->feedback ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>