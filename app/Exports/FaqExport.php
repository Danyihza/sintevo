<?php

namespace App\Exports;

use App\Models\Faq;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FaqExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $data['faq'] = Faq::all();
        return view('tenant.exports.faq', $data);
    }
}
