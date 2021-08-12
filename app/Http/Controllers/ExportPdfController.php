<?php

namespace App\Http\Controllers;

use App\Models\Detail_user;
use App\Models\Faq;
use App\Models\File_Monev;
use App\Models\FileMonev;
use App\Models\Kelulusan;
use App\Models\Monev;
use App\Models\Monev_Finansial;
use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class ExportPdfController extends Controller
{
    public function profileUsaha($id_user)
    {
        $data['detail'] = Detail_user::where('id_detail', $id_user)->first();
        $data['user'] = User::where('id_user', $id_user)->first();
        // dd($data);
        $pdf = PDF::loadView('print.profileusaha', $data);
        return $pdf->download('Profile Usaha - ' . $data['detail']->nama_brand . '.pdf');
        // return view('print.profileusaha', $data);
    }

    public function bukuKas($id_user)
    {
        $data['detail'] = Detail_user::where('id_detail', $id_user)->first();
        $data['brand'] = $data['detail']->nama_brand;
        $data['buku_kas'] = Monev_Finansial::where('id_user', $id_user)->orderby('tanggal', 'DESC')->orderby('created_at', 'DESC')->get();
        $saldo = 0;
        $data['saldo'] = [];
        for ($i = count($data['buku_kas']) - 1; $i >= 0; $i--) {
            if ($data['buku_kas'][$i]->jenis_transaksi == 'Pengeluaran') {
                $saldo -= $data['buku_kas'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            } else {
                $saldo += $data['buku_kas'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            }
        }
        $data['saldos'] = array_reverse($data['saldo']);
        $pdf = PDF::loadView('print.bukukas', $data)->setPaper('a4', 'landscape');
        return $pdf->download("Buku Kas Tenant Vokasi - " . $data['brand'] . ".pdf");
    }

    public function allTenants()
    {
        $data['tenant'] = Detail_user::all();
        $pdf = PDF::loadView('print.alltenant', $data);
        return $pdf->download('Seluruh Tenant.pdf');
    }

    public function allFaq()
    {
        $data['faq'] = Faq::all();
        $pdf = PDF::loadView('print.allfaq', $data);
        return $pdf->download('Rekapitulasi Frequently Asked Questions (FAQ).pdf');
    }

    public function allDataTenant($id_user)
    {
        $data['detail'] = Detail_user::where('id_detail', $id_user)->first();
        $data['user'] = User::where('id_user', $id_user)->first();
        $data['m_produk'] = Monev::where('id_user', $id_user)->where('jenis_monev', 'produk')->get();
        $data['m_pelanggan'] = Monev::where('id_user', $id_user)->where('jenis_monev','pelanggan')->get();
        $data['m_pemasaran'] = Monev::where('id_user', $id_user)->where('jenis_monev','pemasaran')->get();
        $data['m_operasional'] = Monev::where('id_user', $id_user)->where('jenis_monev','operasional')->get();
        $data['m_kendala'] = Monev::where('id_user', $id_user)->where('jenis_monev','kendala')->get();
        $data['m_finansial'] = Monev_Finansial::where('id_user', $id_user)->get();
        $data['file_monev'] = FileMonev::where('id_user', $id_user)->get();

        $data['buku_kas'] = Monev_Finansial::where('id_user', $id_user)->orderby('tanggal', 'DESC')->orderby('created_at', 'DESC')->get();
        $saldo = 0;
        $data['saldo'] = [];
        for ($i = count($data['buku_kas']) - 1; $i >= 0; $i--) {
            if ($data['buku_kas'][$i]->jenis_transaksi == 'Pengeluaran') {
                $saldo -= $data['buku_kas'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            } else {
                $saldo += $data['buku_kas'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            }
        }
        $data['saldos'] = array_reverse($data['saldo']);

        $data['prestasi'] = Prestasi::where('id_user', $id_user)->get();
        $data['kelulusan'] = Kelulusan::where('id_user', $id_user)->get();

        $brand = $data['detail']->nama_brand;
        $pdf = PDF::loadView('print.alldata', $data)->setPaper('A4');
        return $pdf->download("All Data - $brand.pdf");
    }
}
