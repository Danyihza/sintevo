<table>
    <thead>
        <tr>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">No</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Nama Lengkap</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Status</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">NRP/NIDN</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Jabatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tim as $t)
        <tr>
            <td align="center" style="border: 1px solid #000000;">{{ $loop->iteration }}</td>
            <td align="center" style="border: 1px solid #000000;">
                {{ $t->nama }}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{ $t->hasStatus->jenis_status }}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{ $t->no_identify }}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{ $t->jabatan }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>