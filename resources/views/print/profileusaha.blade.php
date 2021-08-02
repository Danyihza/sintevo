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
</style>

<body>
    <div class="text-center">
        <span class="bold">Profil Usaha Tenant Vokasi</span>
    </div>
    <div class="my-5"></div>
    <table>
        <tbody>
            <tr>
                <td class="bold w-48">
                    <span>Status</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td>
                    <span>{{ $detail->statuses->jenis_status }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Kategori Usaha</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td>
                    <span>{{ $detail->kategoris->nama_kategori }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Nama Brand / Usaha</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td>
                    <span>{{ $detail->nama_brand }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Deskripsi Usaha</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td style="word-wrap: break-word">
                    <span>{{ $detail->deskripsi }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Alamat</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td>
                    <span>{{ $detail->alamat }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Nama Ketua</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td>
                    <span>{{ $detail->nama_ketua }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Nomor WhatsApp</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td>
                    <span>{{ $detail->no_whatsapp }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Email Akun</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td>
                    <span>{{ $user->email }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Website</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td>
                    <span>{{ $detail->website ?? '-' }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Instagram</span>
                </td>
                <td>
                    <span>:</span>
                </td>
                <td>
                    <span>{{ $detail->instagram ?? '-' }}</span>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>