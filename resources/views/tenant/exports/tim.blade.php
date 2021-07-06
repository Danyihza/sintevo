<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Status</th>
            <th>NRP/NIDN</th>
            <th>Jabatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tim as $t)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                {{ $t->nama }}
            </td>
            <td>
                {{ $t->hasStatus->jenis_status }}
            </td>
            <td>
                {{ $t->no_identify }}
            </td>
            <td>
                {{ $t->jabatan }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>