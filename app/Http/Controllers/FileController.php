<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    function downloadFile(Request $request)
    {
        $id_file = $request->file;
        $file = File::where('id_file', $id_file)->first();
        return response()->download($file->path_file, $file->nama_file);
    }
}
