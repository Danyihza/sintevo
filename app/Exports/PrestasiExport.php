<?php

namespace App\Exports;

use App\Models\Prestasi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PrestasiExport implements FromView, ShouldAutoSize
{
    protected $id_user;

    public function __construct($id_user) {
        $this->id_user = $id_user;
    }

    public function view(): View
    {
        $data['prestasi'] = Prestasi::where('id_user', $this->id_user)->get();
        return view('tenant.exports.prestasi', $data);
    }
}
