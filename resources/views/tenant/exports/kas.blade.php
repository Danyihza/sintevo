<table>
    <thead>
        <tr>
            <th>Tanggal Transaksi</th>
            <th>Keterangan Transaksi</th>
            <th>Pendapatan (Rp)</th>
            <th>Pengeluaran (Rp)</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        @for($i = 0; $i <= count($buku_kas)-1; $i++)
        <tr>
            <td>
                {{ date('d/m/Y', strtotime($buku_kas[$i]->tanggal)) }}
            </td>
            <td>
                {{ $buku_kas[$i]->keterangan_transaksi }}
            </td>
            <td>
                @if ($buku_kas[$i]->jenis_transaksi == 'Pendapatan')
                    {{ $buku_kas[$i]->jumlah }}
                @endif
            </td>
            <td>
                @if ($buku_kas[$i]->jenis_transaksi == 'Pengeluaran')
                    {{ $buku_kas[$i]->jumlah }}
                @endif
            </td>
            <td>
                {{ $saldos[$i] }}
            </td>
        </tr>
        @endfor
    </tbody>
</table>