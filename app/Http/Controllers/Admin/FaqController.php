<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FaqExport;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FaqController extends Controller
{
    public function faqView()
    {
        $data['title'] = 'faq';
        $data['faq'] = Faq::all();
        return view('admin.faq', $data);
    }

    public function exportFaqExcel()
    {
        return Excel::download(new FaqExport, "All FAQ.xlsx");
    }
}
