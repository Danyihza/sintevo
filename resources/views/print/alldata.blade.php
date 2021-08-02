<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('') }}css/tailwind.output.css" /> --}}
    <title>Seluruh Data Tenant</title>
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

    .font-16 {
        font-size: 16pt;
    }

    .text-center{
        text-align: center;
    }

    .my-32{
        margin-top: 8rem;
        margin-bottom: 8rem;
    }

    .my-5 {
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
    }

    .w-48 {
        width: 10rem;
    }

    table td, table td * {
        vertical-align: top;
    }

    table.border {
        border-left: 0.01em solid #ccc;
        border-right: 0;
        border-top: 0.01em solid #ccc;
        border-bottom: 0;
        border-collapse: collapse;
    }
    table.border td,
    table.border th {
        border-left: 0;
        border-right: 0.01em solid #ccc;
        border-top: 0;
        border-bottom: 0.01em solid #ccc;
        padding: 0.5rem;
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
    }
    .page_break { page-break-before: always; }
</style>

<body>

    <div class="text-center">
        <span class="bold font-16">TENANT VOKASI</span>
    </div>
    <div class="my-32"></div>
    <div class="text-center">
        <img src="{{ asset('assets') }}/img/tenant/{{ $detail->gambar }}" width="150px" alt="">
    </div>
    <div class="my-32"></div>
    <div class="text-center">
        <span class="bold font-16">Nama Usaha : {{ $detail->nama_brand }}</span>
    </div>
    <div class="my-32"></div>
    <div class="my-32"></div>
    <div class="text-center">
        <img src="{{ asset('assets') }}/images/icon.png" width="150px" alt="">
    </div>
    {{-- <div class="my-32"></div> --}}
    <div class="text-center ">
        <span class="bold font-16">INKUBATOR BISNIS</span> <br>
        <span class="bold font-16">POLITEKNIK PERKAPALAN NEGERI SURABAYA</span> <br>
        <span class="bold font-16">SURABAYA</span>
    </div>
    <div class="page_break"></div>
    <span class="bold">Profil Usaha Tenant Vokasi</span>
    <table border="0" style="margin-top: 12px; width: 100%; margin-bottom: 12px;">
        <tbody>
            <tr>
                <td class="bold w-48">
                    <span>Status</span>
                </td>
                <td>
                    <span>: {{ $detail->statuses->jenis_status }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Kategori Usaha</span>
                </td>
                <td>
                    <span>: {{ $detail->kategoris->nama_kategori }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Nama Brand / Usaha</span>
                </td>
                <td>
                    <span>: {{ $detail->nama_brand }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Deskripsi Usaha</span>
                </td>
                <td style="word-wrap: break-word">
                    <span>: {{ $detail->deskripsi }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Alamat</span>
                </td>
                <td>
                    <span>: {{ $detail->alamat }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Nama Ketua</span>
                </td>
                <td>
                    <span>: {{ $detail->nama_ketua }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Nomor WhatsApp</span>
                </td>
                <td>
                    <span>: {{ $detail->no_whatsapp }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Email Akun</span>
                </td>
                <td>
                    <span>: {{ $user->email }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Website</span>
                </td>
                <td>
                    <span>: {{ $detail->website ?? '-' }}</span>
                </td>
            </tr>
            <tr>
                <td class="bold w-48">
                    <span>Instagram</span>
                </td>
                <td>
                    <span>: {{ $detail->instagram ?? '-' }}</span>
                </td>
            </tr>
        </tbody>
    </table>

    <span class="bold">Profil Usaha Tenant Vokasi</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Lengkap</td>
                <td>Prodi</td>
                <td>Status</td>
                <td>NRP/NIDN/NIP</td>
                <td>Jabatan</td>
            </tr>
        </thead>
        <tbody>
            @foreach($user->belongAnggota as $t)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$t->nama}}</td>
                <td>{{$t->prodi ? $t->hasProdi->nama_prodi : '-'}}</td>
                <td>{{$t->hasStatus->jenis_status}}</td>
                <td>{{$t->no_identify}}</td>
                <td>{{$t->jabatan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="page_break"></div>
    <span class="bold">Monev Produk</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>Status Progress</td>
                <td>Uraian Progress</td>
                <td>File</td>
                <td>Feedback</td>
            </tr>
        </thead>
        <tbody>
            @foreach($m_produk as $mp)
            <tr>
                <td>{{date('d/m/Y', strtotime($mp->tanggal))}}</td>
                <td>{{$mp->status_progress}}</td>
                <td>{{$mp->uraian}}</td>
                <td>{{$mp->file ? 'Ada' : '-'}}</td>
                <td>{{$mp->feedback}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <span class="bold">Monev Pelanggan</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>Status Progress</td>
                <td>Uraian Progress</td>
                <td>File</td>
                <td>Feedback</td>
            </tr>
        </thead>
        <tbody>
            @foreach($m_pelanggan as $mp)
            <tr>
                <td>{{date('d/m/Y', strtotime($mp->tanggal))}}</td>
                <td>{{$mp->status_progress}}</td>
                <td>{{$mp->uraian}}</td>
                <td>{{$mp->file ? 'Ada' : '-'}}</td>
                <td>{{$mp->feedback}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <span class="bold">Monev Pemasaran</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>Status Progress</td>
                <td>Uraian Progress</td>
                <td>File</td>
                <td>Feedback</td>
            </tr>
        </thead>
        <tbody>
            @foreach($m_pemasaran as $mp)
            <tr>
                <td>{{date('d/m/Y', strtotime($mp->tanggal))}}</td>
                <td>{{$mp->status_progress}}</td>
                <td>{{$mp->uraian}}</td>
                <td>{{$mp->file ? 'Ada' : '-'}}</td>
                <td>{{$mp->feedback}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <span class="bold">Monev Operasional</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>Status Progress</td>
                <td>Uraian Progress</td>
                <td>File</td>
                <td>Feedback</td>
            </tr>
        </thead>
        <tbody>
            @foreach($m_operasional as $mp)
            <tr>
                <td>{{date('d/m/Y', strtotime($mp->tanggal))}}</td>
                <td>{{$mp->status_progress}}</td>
                <td>{{$mp->uraian}}</td>
                <td>{{$mp->file ? 'Ada' : '-'}}</td>
                <td>{{$mp->feedback}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <span class="bold">Monev Finansial</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <td>Tanggal Transaksi</td>
                <td>Bukti Transaksi</td>
                <td>Status Progress</td>
                <td>Uraian Progress</td>
                <td>Jumlah</td>
            </tr>
        </thead>
        <tbody>
            @foreach($m_finansial as $mp)
            <tr>
                <td>{{date('d/m/Y', strtotime($mp->tanggal))}}</td>
                <td>{{$mp->file ? 'Ada' : '-'}}</td>
                <td>{{$mp->jenis_transaksi}}</td>
                <td>{{$mp->keterangan_transaksi ? 'Ada' : '-'}}</td>
                <td>{{$mp->jumlah}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <span class="bold">Monev Kendala</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>Status Progress</td>
                <td>Uraian Progress</td>
                <td>File</td>
                <td>Feedback</td>
            </tr>
        </thead>
        <tbody>
            @foreach($m_kendala as $mp)
            <tr>
                <td>{{date('d/m/Y', strtotime($mp->tanggal))}}</td>
                <td>{{$mp->status_progress}}</td>
                <td>{{$mp->uraian}}</td>
                <td>{{$mp->file ? 'Ada' : '-'}}</td>
                <td>{{$mp->feedback}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="page_break"></div>
    <span class="bold">File dan Lampiran</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>Jenis Kegiatan</td>
                <td>Keterangan File</td>
                <td>File</td>
                <td>Feedback</td>
            </tr>
        </thead>
        <tbody>
            @foreach($file_monev as $fm)
            <tr>
                <td>{{date('d/m/Y', strtotime($fm->tanggal))}}</td>
                <td>{{$fm->jenis_kegiatan}}</td>
                <td>{{$fm->keterangan_file}}</td>
                <td>{{$fm->file ? 'Ada' : '-'}}</td>
                <td>{{$fm->feedback}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="page_break"></div>
    <span class="bold">Buku Kas</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
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
    <div class="page_break"></div>
    <span class="bold">Prestasi</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Prestasi</th>
                <th>Tingkat Prestasi</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestasi as $pr)
                <tr>
                    <td>
                        {{date('d/m/Y', strtotime($pr->tanggal))}}
                    </td>
                    <td>
                        {{$pr->jenis_kegiatan}}
                    </td>
                    <td>
                        {{$pr->prestasi}}
                    </td>
                    <td>
                        {{$pr->tingkat_prestasi}}
                    </td>
                    <td>
                        {{$pr->file ? 'Ada' : '-'}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="page_break"></div>
    <span class="bold">Berkas & Kelulusan</span>
    <table border="0" class="border" style="width: 100%; margin-top: 12px; margin-bottom: 12px;">
        <thead>
            <tr>
                <th>Keterangan</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelulusan as $kl)
                <tr>
                    <td>
                        {{$kl->kelulusan}}
                    </td>
                    <td>
                        {{$kl->file ? 'Ada' : '-'}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>