<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Detail_user;
use App\Models\File;
use App\Models\Kategori;
use App\Models\Monev;
use App\Models\Monev_Finansial as MonevFinansial;
use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Redirect;

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
        $data['tim'] = User::where('id_user', $id_detail)->with('hasDetail', 'hasDetail.kategoris')->first();
        // dd($data['tim']);
        $data['produk'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'produk'])->orderBy('tanggal', 'DESC')->get();
        $data['pelanggan'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'pelanggan'])->orderBy('tanggal', 'DESC')->get();
        $data['pemasaran'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'pemasaran'])->orderBy('tanggal', 'DESC')->get();
        $data['operasional'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'operasional'])->orderBy('tanggal', 'DESC')->get();
        $data['kendala'] = Monev::where(['id_user' => $id_detail, 'jenis_monev' => 'kendala'])->orderBy('tanggal', 'DESC')->get();
        $data['finansial'] = MonevFinansial::where(['id_user' => $id_detail])->orderBy('tanggal', 'DESC')->get();
        $data['prestasi'] = Prestasi::where(['id_user' => $id_detail])->orderBy('tanggal', 'DESC')->get();
        $data['usaha'] = Detail_user::where(['id_detail' => $id_detail])->first();
        return view('admin.tenant.detail', $data);
    }

    public function hapusSeluruhDataTenant($id_tenant)
    {
        $file = File::where('uploader', $id_tenant)->get();
        if (count($file) > 0) {
            foreach($file as $f){
                FacadesFile::delete($f->path_file);
            }
            $file->delete();
        }
        $prestasi = Prestasi::where('id_user', $id_tenant)->get();
        if (count($prestasi) > 0) {
            $prestasi->delete();
        }
        $monev = Monev::where('id_user', $id_tenant)->get();
        if (count($prestasi) > 0) {
            $monev->delete();
        }
        $monev_finansial = MonevFinansial::where('id_user', $id_tenant)->get();
        if (count($monev_finansial) > 0) {
            $monev_finansial->delete();
        }
        $anggota = Anggota::where('id_user', $id_tenant)->get();
        if (count($anggota) > 0) {
            $anggota->delete();
        }

        $tenant = Detail_user::where('id_detail', $id_tenant)->first();
        $nama = $tenant->nama_brand;
        $tenant->delete();
        User::where('id_user', $id_tenant)->first()->delete();
        return redirect()->route('admin.listTenants')->with('success', "Tenant '$nama' berhasil dihapus");
    }
}
