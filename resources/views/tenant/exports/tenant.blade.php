<table>
    <thead>
        <tr>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">No</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Nama Tenant</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Kategori Usaha</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Nama Ketua</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Status Ketua</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">No WhatsApp</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tenant as $tnt)
        <tr>
            <td align="center" style="border: 1px solid #000000;">{{ $loop->iteration }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $tnt->nama_brand }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $tnt->kategoris->nama_kategori }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $tnt->nama_ketua }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $tnt->statuses->jenis_status }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $tnt->no_whatsapp }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $tnt->alamat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>