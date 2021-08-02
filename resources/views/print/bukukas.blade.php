<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('') }}css/tailwind.output.css" />
    <title>Profile Usaha</title>
</head>

<style>
    /* @page {
        margin-top: 2.54cm;
        margin-bottom: 2.54cm;
    }

    @media print {
    body {
        margin-top: 2.54cm; margin-bottom: 2.54cm; 
        margin-left: 2.54cm; margin-right: 2.54cm;
        }
    } */

    span {
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
    }

    .bold {
        font-weight: bold;
    }

    table td, table td * {
        vertical-align: top;
    }

    table {
        border-left: 0.01em solid #ccc;
        border-right: 0;
        border-top: 0.01em solid #ccc;
        border-bottom: 0;
        border-collapse: collapse;
    }
    table td,
    table th {
        border-left: 0;
        border-right: 0.01em solid #ccc;
        border-top: 0;
        border-bottom: 0.01em solid #ccc;
        padding: 0.5rem;
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
    }
</style>

<body>
    <div class="text-center">
        <span class="bold">Buku Kas Tenant Vokasi</span> <br>
        <span class="bold">{{ $brand }}</span>
    </div>
    <div class="my-5"></div>
    <table border="1" class="mx-auto">
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
                <td align="center">
                    @if ($buku_kas[$i]->jenis_transaksi == 'Pendapatan')
                        +
                        {{ $buku_kas[$i]->jumlah }}
                    @else
                    -
                    @endif
                </td>
                <td align="center">
                    @if ($buku_kas[$i]->jenis_transaksi == 'Pengeluaran')
                        -
                        {{ $buku_kas[$i]->jumlah }}
                    @else
                    -
                    @endif
                </td>
                <td align="center" class="py-3 jumlah" id="saldo">
                    {{ $saldos[$i] }}
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script>
    new AutoNumeric.multiple('.jumlah', {
        allowDecimalPadding: false,
        decimalCharacter: ",",
        digitGroupSeparator: "."
    })
</script>