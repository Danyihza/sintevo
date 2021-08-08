<?php

namespace App\Exports;

use App\Models\Monev;
use App\Models\Monev_Finansial;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MonevExport implements FromView, ShouldAutoSize
{

    protected $id_user;
    protected $isFinansial;
    protected $jenis_monev;

    public function __construct($id_user, bool $isFinansial = false, String $jenis_monev = null)
    {
        $this->id_user = $id_user;
        $this->isFinansial = $isFinansial;
        $this->jenis_monev = $jenis_monev;
    }

    public function view(): View
    {
        if ($this->isFinansial == true) {
            $data['finansial'] = Monev_Finansial::where('id_user', $this->id_user)->orderBy('tanggal', 'DESC')->get();
            return view('tenant.exports.finansial', $data);
        }
        $data['monev'] = Monev::where('id_user', $this->id_user)->where('jenis_monev', $this->jenis_monev)->orderBy('tanggal', 'DESC')->get();
        return view('tenant.exports.monev', $data);
    }

}
