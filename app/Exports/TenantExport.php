<?php

namespace App\Exports;

use App\Models\Detail_user;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TenantExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $data['tenant'] = Detail_user::all();
        return view('tenant.exports.tenant', $data);
    }
}
