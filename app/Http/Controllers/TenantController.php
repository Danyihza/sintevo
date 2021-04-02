<?php

namespace App\Http\Controllers;

use App\Models\Detail_user;
use App\Models\Kategori;
use App\Models\Prodi;
use Illuminate\Http\Request;

class TenantController extends Controller
{

    public function index()
    {
        $data['title'] = 'home';
        return view('tenant.home', $data);
    }

    public function profile($params = null)
    {
        $data['title'] = 'profile';
        $session = session()->get('login-data');
        $data['usaha'] = Detail_user::with('kategoris', 'prodis', 'statuses')->where('id_detail', $session['id'])->first();
        $data['prodi'] = Prodi::all();
        $data['kategori'] = Kategori::all();
        switch ($params) {
            case 'usaha':
                $data['state'] = 'usaha';
                return view('tenant.profile.usaha', $data);
                break;
            case 'tim':
                $data['state'] = 'tim';
                return view('tenant.profile.tim', $data);
                break;
            default:
                abort(404);
                break;
        }
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
            case 'finansial':
                $data['state'] = 'finansial';
                return view('tenant.monev.finansial', $data);
                break;
            case 'kendala':
                $data['state'] = 'kendala';
                return view('tenant.monev.kendala', $data);
                break;
            case 'operasional':
                $data['state'] = 'operasional';
                return view('tenant.monev.operasional', $data);
                break;
            case 'pelanggan':
                $data['state'] = 'pelanggan';
                return view('tenant.monev.pelanggan', $data);
                break;
            case 'pemasaran':
                $data['state'] = 'pemasaran';
                return view('tenant.monev.pemasaran', $data);
                break;
            case 'produk':
                $data['state'] = 'produk';
                return view('tenant.monev.produk', $data);
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
