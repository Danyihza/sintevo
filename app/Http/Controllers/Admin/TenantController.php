<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detail_user;
use App\Models\Monev;
use App\Models\Monev_Finansial;
use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $data['title'] = 'tenantmanagement';
        $data['tenant'] = Detail_user::with('kategoris','statuses')->get();
        // dd($data['tenant']);
        return view('admin.tenantmanagement', $data);
    }

    public function tenantDetail($id_detail)
    {
        $data['title'] = 'tenantmanagement';
        $data['tim'] = User::where('id_user', $id_detail)->first();
        $data['produk'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'produk'])->orderBy('tanggal', 'DESC')->get();
        $data['pelanggan'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'pelanggan'])->orderBy('tanggal', 'DESC')->get();
        $data['pemasaran'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'pemasaran'])->orderBy('tanggal', 'DESC')->get();
        $data['operasional'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'operasional'])->orderBy('tanggal', 'DESC')->get();
        $data['kendala'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'kendala'])->orderBy('tanggal', 'DESC')->get();
        $data['finansial'] = Monev_Finansial::where(['id_user' => $id_detail])->orderBy('tanggal', 'DESC')->get();
        return view('admin.tenant.detail', $data);
    }
}
