<table>
    <thead>
        <tr>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Tanggal Transaksi</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Keterangan Transaksi</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Pendapatan (Rp)</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Pengeluaran (Rp)</th>
            <th align="center" style="background-color: #92D050; border: 1px solid #000000;">Saldo (Rp)</th>
        </tr>
    </thead>
    <tbody>
        @for($i = 0; $i <= count($buku_kas)-1; $i++)
        <tr>
            <td align="center" style="border: 1px solid #000000;">
                {{ date('d/m/Y', strtotime($buku_kas[$i]->tanggal)) }}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{ $buku_kas[$i]->keterangan_transaksi }}
            </td>
            <td align="center" style="border: 1px solid #000000;">
                @if ($buku_kas[$i]->jenis_transaksi == 'Pendapatan')
                    {{ $buku_kas[$i]->jumlah }}
                @endif
            </td>
            <td align="center" style="border: 1px solid #000000;">
                @if ($buku_kas[$i]->jenis_transaksi == 'Pengeluaran')
                    {{ $buku_kas[$i]->jumlah }}
                @endif
            </td>
            <td align="center" style="border: 1px solid #000000;">
                {{ $saldos[$i] }}
            </td>
        </tr>
        @endfor
    </tbody>
</table>