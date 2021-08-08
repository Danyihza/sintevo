<?php

namespace App\Exports;

use App\Models\Monev_Finansial;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KasExport implements FromView, ShouldAutoSize
{
    protected $id_user;

    public function __construct(String $id_user)
    {
        $this->id_user = $id_user;
    }

    public function view(): View
    {
        $data['buku_kas'] = Monev_Finansial::where('id_user', $this->id_user)->orderby('tanggal', 'DESC')->orderby('created_at', 'DESC')->get();
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
        return view('tenant.exports.kas', $data);
    }
}
