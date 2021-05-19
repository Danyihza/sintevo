<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\File;
use App\Models\User;
use App\Models\Monev;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\Prestasi;
use App\Models\Detail_user;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Monev_Finansial;
use Illuminate\Support\Facades\Redirect;

class TenantController extends Controller
{
    // TESTING FUNCTION
    // public function test(Request $request)
    // {
    //     $id = $request->id;
    // }
    // TESTING FUNCTION


    public function index()
    {
        $data['title'] = 'home';
        $data['owner'] = Detail_user::where(['id_detail' => session('login-data')['id']])->first();
        return view('tenant.home', $data);
    }

    public function profile($params = null)
    {
        $data['title'] = 'profile';
        $session = session()->get('login-data');
        $data['prodi'] = Prodi::all();
        $data['kategori'] = Kategori::all();
        switch ($params) {
            case 'usaha':
                $data['state'] = 'usaha';
                $data['usaha'] = Detail_user::where('id_detail', $session['id'])->first();
                // dd($data['usaha']);
                return view('tenant.profile.usaha', $data);
                break;
            case 'tim':
                $data['state'] = 'tim';
                $data['tim'] = User::where('id_user', $session['id'])->first();
                $data['status'] = Status::all();
                return view('tenant.profile.tim', $data);
                break;
            default:
                abort(404);
                break;
        }
    }

    function deleteAnggota($id_anggota)
    {
        try {
            Anggota::where('id_anggota', $id_anggota)->delete();
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'Something went wrong, Error: ' . $th->getMessage());
        }
        return Redirect::back()->with('success', 'Data Anggota berhasil dihapus');
    }

    function tambahAnggota(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'no_identify' => 'required|numeric',
            'jabatan' => 'required'
        ]);

        if ($request->isMahasiswa == 'true') {
            $data = $request->except(['_token', 'isMahasiswa']);
        } else {
            $data = $request->except(['_token', 'isMahasiswa', 'prodi']);
        }

        try {
            Anggota::create($data);
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'Something Went Wrong: ' . $th->getMessage());
        }
        return Redirect::back()->with('success', 'Anggota baru berhasil ditambahkan');
    }

    function updateAnggota(Request $request)
    {
        if ($request->isMahasiswa == 'true') {
            $data = $request->except(['_token', 'isMahasiswa', 'id_user']);
        } else {
            $data = $request->except(['_token', 'isMahasiswa', 'id_user']);
            $data['prodi'] = null;
        }
        try {
            Anggota::where('id_anggota', $request->id_anggota)
                ->update($data);
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'Something Went Wrong: ' . $th->getMessage());
        }
        return Redirect::back()->with('success', 'Data berhasil diubah');
    }

    function updateUsaha(Request $request)
    {
        $id_detail = $request->id_detail;
        $prodi = $request->prodi;
        // dd($prodi);
        $kategori = $request->kategori;
        $nama_brand = $request->nama_brand;
        $deskripsi = $request->deskripsi;
        $alamat = $request->alamat;
        $nama_ketua = $request->nama_ketua;
        $no_whatsapp = $request->no_whatsapp;
        $website = $request->website;
        $instagram = $request->instagram;

        $profil = Detail_user::find($id_detail);
        if ($prodi) {
            $profil->prodi = $prodi;
        }
        $profil->kategori = $kategori;
        $profil->nama_brand = $nama_brand;
        $profil->deskripsi = $deskripsi;
        $profil->alamat = $alamat;
        $profil->nama_ketua = $nama_ketua;
        $profil->no_whatsapp = $no_whatsapp;
        $profil->website = $website;
        $profil->instagram = $instagram;
        if ($profil->isClean() == true) {
            return Redirect::back()->with('error', 'Data tidak ada yang berubah');
        }
        $profil->save();

        return Redirect::back()->with('success', 'Sukses! Data berhasil diperbarui');
    }

    public function informasi($params = null)
    {
        $data['title'] = 'informasi';
        switch ($params) {
            case 'download':
                $data['state'] = 'download';
                return view('tenant.informasi.download', $data);
                break;
            case 'pengumuman':
                $data['state'] = 'pengumuman';
                return view('tenant.informasi.pengumuman', $data);
                break;
            default:
                abort(404);
                break;
        }
    }

    public function monev($params = null)
    {
        $data['title'] = 'monev';
        if ($params != 'finansial') {
            $data['history'] = Monev::where(['id_user' => session('login-data')['id'], 'jenis_monev' => $params])->with('hasFile')->orderBy('tanggal', 'DESC')->get();
        }
        // dd($data['history']);
        switch ($params) {
            case 'produk':
                $data['state'] = 'produk';
                return view('tenant.monev.produk', $data);
                break;
            case 'pelanggan':
                $data['state'] = 'pelanggan';
                return view('tenant.monev.pelanggan', $data);
                break;
            case 'pemasaran':
                $data['state'] = 'pemasaran';
                return view('tenant.monev.pemasaran', $data);
                break;
            case 'operasional':
                $data['state'] = 'operasional';
                return view('tenant.monev.operasional', $data);
                break;
            case 'finansial':
                $data['state'] = 'finansial';
                $data['finansial'] = Monev_Finansial::where(['id_user' => session('login-data')['id']])->with('hasFile')->orderBy('tanggal', 'DESC')->get();
                return view('tenant.monev.finansial', $data);
                break;
            case 'kendala':
                $data['state'] = 'kendala';
                return view('tenant.monev.kendala', $data);
                break;
            default:
                abort(404);
                break;
        }
    }

    function monev_tambah($sub_monev, Request $request)
    {
        if ($sub_monev == 'finansial') {
            return self::tambahMonevFinansial($request);
        } else {
            // dd($request->file('upload_file'));
            try {
                $monev = new Monev;
                $monev->id_monev = Str::random(8);
                $monev->id_user = session('login-data')['id'];
                $monev->jenis_monev = $sub_monev;
                $monev->status_progress = $request->status_progress;
                $monev->uraian = $request->uraian_progress;
                $tanggal = explode('/', $request->tanggal);
                $res_tanggal = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
                $monev->tanggal = $res_tanggal;
                $upload = $request->file('upload_file');
                if ($upload) {
                    $file = new File;
                    $upload_path = 'assets/file/';
                    $file_name = Str::random(32);
                    $file->id_file = $file_name;
                    $file->uploader = session('login-data')['id'];
                    $file->nama_file = $upload->getClientOriginalName();
                    $file->path_file = $upload_path . $file_name;
                    $file->save();

                    $monev->file = $file_name;
                    $upload->move($upload_path, $file_name);
                }
                $monev->save();
                return Redirect::back()->with('success', 'Sukses Menambahkan Data');
            } catch (\Throwable $th) {
                return Redirect::back()->with('error', 'Something went wrong: ' . $th->getMessage());
            }
        }
    }
    // function monev_tambah($sub_monev, Request $request)
    // {
    //     if ($sub_monev == 'finansial') {
    //         return self::tambahMonevFinansial($request);
    //     } else {
    //         $request->validate([
    //             'upload_file' => 'mimes:pdf'
    //         ]);
    //         // dd($request->file('upload_file'));
    //         try {
    //             $monev = new Monev;
    //             $monev->id_monev = Str::random(8);
    //             $monev->id_user = session('login-data')['id'];
    //             $monev->jenis_monev = $sub_monev;
    //             $monev->status_progress = $request->status_progress;
    //             $monev->uraian = $request->uraian_progress;
    //             $monev->tanggal = $request->tanggal;
    //             $file = $request->file('upload_file');
    //             if ($file) {
    //                 $upload_path = 'assets/file/monev/';
    //                 $file_name = Str::random(32);
    //                 $monev->nama_file = $file->getClientOriginalName();
    //                 $monev->path = $upload_path . $file_name;
    //                 $file->move($upload_path, $file_name);
    //             }
    //             $monev->save();
    //             return Redirect::back()->with('success', 'Sukses Menambahkan Data');
    //         } catch (\Throwable $th) {
    //             return Redirect::back()->with('error', 'Something went wrong: ' . $th->getMessage());
    //         }
    //     }
    // }

    public static function tambahMonevFinansial($request)
    {
        $request->validate([
            'bukti_transaksi' => 'required',
            'jenis_transaksi' => 'required',
            'keterangan_transaksi' => 'required',
            'jumlah' => 'required'
        ]);
        try {
            $finansial = new Monev_Finansial;
            $finansial->id_finansial = Str::random(16);
            $finansial->id_user = session('login-data')['id'];
            $tanggal = explode('/', $request->tanggal);
            $res_tanggal = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
            $finansial->tanggal = $res_tanggal;
            $finansial->jenis_transaksi = $request->jenis_transaksi;
            $finansial->keterangan_transaksi = $request->keterangan_transaksi;
            $finansial->jumlah = $request->jumlah;

            // Handle File
            $upload = self::_uploadFile($request, 'bukti_transaksi');
            if ($upload == false) {
                throw new Exception("Gagal Upload File", 1);
                
            }
            // $bukti = $request->file('bukti_transaksi');
            // $file = new File;
            // $upload_path = 'assets/file/';
            // $file_name = Str::random(32);
            // $file->uploader = session('login-data')['id'];
            // $file->id_file = $file_name;
            // $file->nama_file = $bukti->getClientOriginalName();
            // $file->path_file = $upload_path . $file_name;
            // $file->save();
            // $bukti->move($upload_path, $file_name);
            $finansial->file = $upload;
            
            $finansial->save();
            return Redirect::back()->with('success', 'Sukses Menambahkan Data');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }

    public function upload_file()
    {
        $data['title'] = 'upload_file';
        return view('tenant.upload_file', $data);
    }

    public function buku_kas()
    {
        $data['title'] = 'buku_kas';
        return view('tenant.buku_kas', $data);
    }

    public function prestasi()
    {
        $data['title'] = 'prestasi';
        $data['prestasi'] = Prestasi::where('id_user', session('login-data')['id'])->get();
        return view('tenant.prestasi', $data);
    }

    public function addPrestasi(Request $request)
    {
        $prestasi = new Prestasi;
        $tanggal = $request->tanggal;
        $prestasi->tanggal = $tanggal[2] . '-' . $tanggal[1] . '-' . $tanggal[0];
        $prestasi->jenis_kegiatan = $request->jenis_kegiatan;
        $prestasi->prestasi = $request->prestasi;
        $prestasi->tingkat_prestasi = $request->tingkat_prestasi;

        $file = $request->file('upload_file');
    }

    public function kelulusan()
    {
        $data['title'] = 'kelulusan';
        return view('tenant.kelulusan', $data);
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
            $file->nama_file = $bukti->getClientOriginalName();
            $file->path_file = $upload_path . $file_name;
            $file->save();
            $upload->move($upload_path, $file_name);
            return $file_name;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
