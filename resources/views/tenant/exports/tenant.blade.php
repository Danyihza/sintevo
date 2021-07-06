<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tenant</th>
            <th>Kategori Usaha</th>
            <th>Nama Ketua</th>
            <th>Status Ketua</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tenant as $tnt)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tnt->nama_brand }}</td>
            <td>{{ $tnt->kategoris->nama_kategori }}</td>
            <td>{{ $tnt->nama_ketua }}</td>
            <td>{{ $tnt->statuses->jenis_status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>