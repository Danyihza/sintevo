<table>
    <thead>
        <tr>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Tanggal Transaksi</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Jenis Transaksi</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Keterangan Transaksi</th>
            <th align="center" style="background-color: darkgreen; border: 1px solid #000000;">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($finansial as $finan)
        <tr>
            <td align="center" style="border: 1px solid #000000;">{{ date('d/m/Y', strtotime($finan->tanggal)) }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $finan->jenis_transaksi }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $finan->keterangan_transaksi }}</td>
            <td align="center" style="border: 1px solid #000000;">{{ $finan->jumlah }}</td>
        </tr>
        @endforeach
    </tbody>
</table>