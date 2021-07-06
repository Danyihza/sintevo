<?php

namespace App\Exports;

use App\Models\Anggota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TimExport implements FromView, ShouldAutoSize
{
    protected $id_user;

    public function __construct($id_user) {
        $this->id_user = $id_user;
    }

    public function view(): View
    {
        $data['tim'] = Anggota::where('id_user', $this->id_user)->get();
        return view('tenant.exports.tim', $data);
    }
}
