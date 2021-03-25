<?php

namespace App\Http\Controllers;

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
        switch ($params) {
            case 'usaha':
                return view('tenant.profile.usaha', $data);
                break;
            case 'tim':
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
                return view('tenant.informasi.download', $data);
                break;
            case 'pengumuman':
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
                return view('tenant.monev.finansial', $data);
                break;
            case 'kendala':
                return view('tenant.monev.kendala', $data);
                break;
            case 'operasional':
                return view('tenant.monev.operasional', $data);
                break;
            case 'pelanggan':
                return view('tenant.monev.pelanggan', $data);
                break;
            case 'pemasaran':
                return view('tenant.monev.pemasaran', $data);
                break;
            case 'produk':
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
