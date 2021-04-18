<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Detail_user;
use App\Models\Kategori;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TenantController extends Controller
{
    // TESTING FUNCTION
    public function test()
    {
        $test= session('login-data');
        return $test;
    }
    // TESTING FUNCTION


    public function index()
    {
        $data['title'] = 'home';
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
            return Redirect::back()->with('error', 'Something went wrong, Error: '.$th->getMessage());
        }
        return Redirect::back()->with('success', 'Data Anggota berhasil dihapus');
    }

    function tambahAnggota(Request $request){
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

    function updateAnggota(Request $request){
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
            return Redirect::back()->with('error', 'Something Went Wrong: '.$th->getMessage());
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
        return view('tenant.prestasi', $data);
    }

    public function kelulusan()
    {
        $data['title'] = 'kelulusan';
        return view('tenant.kelulusan', $data);
    }
}
