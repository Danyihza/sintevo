<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jenis Kegiatan</th>
            <th>Keterangan File</th>
            <th>Feedback</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lampiran as $lamp)
        <tr>
            <td>{{ date('d/m/Y', strtotime($lamp->tanggal)) }}</td>
            <td>{{ $lamp->jenis_kegiatan }}</td>
            <td>{{ $lamp->keterangan_file }}</td>
            <td>{{ $lamp->feedback ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>