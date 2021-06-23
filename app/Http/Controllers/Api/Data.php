<?php

namespace App\Http\Controllers\Api;

use App\Models\Anggota;
use App\Models\File;
use App\Models\FileMonev;
use App\Models\Monev;
use App\Models\Monev_Finansial;
use App\Models\Prestasi;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class Data extends Controller {

    public function getProdi()
    {
        $result = Prodi::all();
        return response()->json($result, 200);
    }

    public function getAnggota($id_anggota)
    {
        $result = Anggota::with('hasStatus', 'hasProdi')->where('id_anggota', $id_anggota)->first();
        return response()->json($result, 200);
    }

    public function getStatus()
    {
        $result = Status::all();
        return response()->json($result, 200);
    }

    public function getFinansial($id_finansial)
    {
        $finansial = Monev_Finansial::with('hasFile')->where('id_finansial', $id_finansial)->first();
        return response()->json($finansial, 200);
    }

    public function getFileMonev($id_filemonev)
    {
        $filemonev = FileMonev::with('hasFile')->where('id_filemonev', $id_filemonev)->first();
        return response()->json($filemonev, 200);
    }

    public function getPrestasi($id_prestasi)
    {
        $prestasi = Prestasi::with('hasFile')->where('id_prestasi', $id_prestasi)->first();
        return response()->json($prestasi, 200);
    }

    public function addFeedback(Request $request)
    {
        $id_monev = $request->id;
        $feedback = $request->feedback;

        try {
            $monev = Monev::where('id_monev', $id_monev)->first();
            $monev->feedback = $feedback;
            $monev->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Updated'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function editPrestasi(Request $request, $id_prestasi)
    {
        $prestasi = Prestasi::find($id_prestasi);
        $tanggal = explode('/', $request->tanggal);
        $prestasi->tanggal = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
        $prestasi->kegiatan = $request->kegiatan;
        $prestasi->prestasi = $request->prestasi;
        $prestasi->tingkat_prestasi = $request->tingkat_prestasi;
        $upload = $request->file('upload_file');
        if ($upload) {
            // Initial New File
            $file_name = Str::random(32);
            $prestasi->file = $file_name;
            $file = new File;
            $upload_path = 'assets/file/';
            $file->uploader = $request->uploader;
            $file->nama_file = $file->getClientOriginalName();
            $file->path_file = $upload_path . $file->getClientOriginalName();
            $file->save();
            $upload->move($upload_path, $file->getClientOriginalName());
            
            // Deleting old file
            $old_file = File::find($prestasi->file);
            $old_file->delete();
            Storage::delete($upload_path . $prestasi->file);
        }
        $prestasi->save();
        return Redirect::back()->with('success', 'Data berhasil diperbarui');
    }
}