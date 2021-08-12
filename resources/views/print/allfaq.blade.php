<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('') }}css/tailwind.output.css" />
    <title>Seluruh Faq</title>
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
        <span class="bold">
            Rekapitulasi <i>Frequently Asked Questions (FAQ)</i> <br> Inkubator Bisnis PPNS
        </span>
    </div>
    <div class="my-5"></div>
    <table border="1" class="mx-auto">
        <thead>
            <tr style="background: #00B0F0;">
                <th>Nomor</th>
                <th>Tanggal</th>
                <th>Nama Usaha</th>
                <th>Pertanyaan/Feedback</th>
                <th>Tanggapan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faq as $fq)
            <tr>
                <td style="text-align: center;">
                    {{ $loop->iteration }}
                </td>
                <td style="text-align: center;">
                    {{ date('d/m/Y', strtotime($fq->tanggal)) }}
                </td>
                <td style="text-align: center;">
                    {{ $fq->nama_usaha }}
                </td>
                <td style="text-align: justify;">
                    {{ $fq->pertanyaan }}
                </td>
                <td style="text-align: justify;">
                    {{ $fq->tanggapan ?? '-' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>