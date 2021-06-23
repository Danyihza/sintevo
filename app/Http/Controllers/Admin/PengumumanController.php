<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Juknis;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function index()
    {
        $data['title'] = 'pengumumaninformasi';
        $data['pengumuman'] = Pengumuman::orderBy('end_at', 'DESC')->get();
        return view('admin.pengumumaninformasi', $data);
    }

    public function petunjukTeknis()
    {
        $data['title'] = 'pengumumaninformasi';
        $data['juknis'] = Juknis::orderBy('created_at', 'DESC')->get();
        return view('admin.petunjukteknis', $data);
    }

    public function addJuknis(Request $request)
    {
        try {
            $kode = $request->kode;
            $juknis = new Juknis;
            $juknis->id_juknis = Str::random(16);
            $juknis->kode = $kode;
            $juknis->file = self::_uploadFile($request, 'upload_file');
            $juknis->save();
            return Redirect::back()->with('success', 'Sukses Menambahkan Data');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }

    public function addPengumuman(Request $request)
    {
        try {
            $tanggal = $request->tanggal;
            $is_permanent = $request->is_permanent;
            $kode = $request->kode;
            $pengumuman = $request->pengumuman;
            // $file = $request->file('upload_file');

            $newPengumuman = new Pengumuman;
            $newPengumuman->id_pengumuman = Str::random(16);
            $newPengumuman->kode = $kode;
            $newPengumuman->pengumuman = $pengumuman;
            $newPengumuman->file = self::_uploadFile($request, 'upload_file');
            if ($is_permanent == null) {
                $tanggal = explode('/', $tanggal);
                $newPengumuman->end_at = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
            }
            $newPengumuman->save();
            return Redirect::back()->with('success', 'Sukses Menambahkan Data');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }

    private static function _uploadFile($request, $upload_name)
    {
        try {
            $upload = $request->file($upload_name);
            $file = new File;
            $upload_path = 'assets/file/';
            $file_name = Str::random(32);
            $file->uploader = session('login-data')['id'];
            $file->id_file = $file_name;
            $file->nama_file = $upload->getClientOriginalName();
            $file->path_file = $upload_path . $file_name;
            $file->save();
            $upload->move($upload_path, $file_name);
            return $file_name;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }
}
