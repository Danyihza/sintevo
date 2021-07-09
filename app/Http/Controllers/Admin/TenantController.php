<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KasAdminExport;
use App\Exports\KasExport;
use App\Exports\LampiranExport;
use App\Exports\MonevExport;
use App\Exports\PrestasiExport;
use App\Exports\TenantExport;
use App\Exports\TimExport;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Detail_user;
use App\Models\File;
use App\Models\FileMonev;
use App\Models\Kategori;
use App\Models\Kelulusan;
use App\Models\Monev;
use App\Models\Monev_Finansial as MonevFinansial;
use App\Models\Monev_Finansial;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class TenantController extends Controller
{
    public function index()
    {
        $data['title'] = 'tenantmanagement';
        $data['tenant'] = Detail_user::with('kategoris', 'statuses')->get();
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
        $data['lampiran'] = FileMonev::where(['id_user' => $id_detail])->orderBy('tanggal', 'DESC')->get();
        $data['kelulusan'] = Kelulusan::where(['id_user' => $id_detail])->get();

        $data['buku_kas'] = Monev_Finansial::where('id_user', $id_detail)->orderby('tanggal', 'DESC')->orderby('created_at', 'DESC')->get();
        $saldo = 0;
        $data['saldo'] = [];
        for ($i = count($data['buku_kas']) - 1; $i >= 0; $i--) {
            if ($data['buku_kas'][$i]->jenis_transaksi == 'Pengeluaran') {
                $saldo -= $data['buku_kas'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            } else {
                $saldo += $data['buku_kas'][$i]->jumlah;
                $data['saldo'][$i] = $saldo;
            }
        }
        $data['saldos'] = array_reverse($data['saldo']);

        return view('admin.tenant.detail', $data);
    }

    public function addSertifikat(Request $request)
    {
        $request->validate(
            [
                'upload_file' => 'required'
            ],
            [
                'upload_file.required' => 'Formulir tidak diisi dengan lengkap, penambahan sertifikat tidak berhasil'
            ]
        );
        $id_user = $request->id_user;
        $lulus = $request->kelulusan;
        $kelulusan = new Kelulusan;
        $kelulusan->id_kelulusan = Str::random(32);
        $kelulusan->id_user = $id_user;
        $kelulusan->kelulusan = $lulus;
        if ($request->file('upload_file')) {
            $kelulusan->file = self::_uploadFile($request, 'upload_file');
        }
        $kelulusan->save();
        return Redirect::back()->with('success', 'Sukses Menambahkan Data');
    }

    public function removeSertifikat($id_kelulusan)
    {
        try {
            $kelulusan = Kelulusan::where('id_kelulusan', $id_kelulusan)->first();
            if ($kelulusan->hasFile) {
                FacadesFile::delete($kelulusan->hasFile->path_file);
                File::where('id_file', $kelulusan->file)->first()->delete();
            }
            $kelulusan->delete();
            return Redirect::back()->with('success', 'Sukses Menghapus Data');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }

    public function hapusSeluruhDataTenant($id_tenant)
    {
        try {
            $file = File::where('uploader', $id_tenant);
            if (count($file->get()) > 0) {
                foreach ($file as $f) {
                    FacadesFile::delete($f->path_file);
                }
                $file->delete();
            }
            $prestasi = Prestasi::where('id_user', $id_tenant);
            if (count($prestasi->get()) > 0) {
                $prestasi->delete();
            }
            $monev = Monev::where('id_user', $id_tenant);
            if (count($prestasi->get()) > 0) {
                $monev->delete();
            }
            $monev_finansial = MonevFinansial::where('id_user', $id_tenant);
            if (count($monev_finansial->get()) > 0) {
                $monev_finansial->delete();
            }
            $anggota = Anggota::where('id_user', $id_tenant);
            if (count($anggota->get()) > 0) {
                $anggota->delete();
            }
            $kelulusan = Kelulusan::where('id_user', $id_tenant);
            if (count($kelulusan->get()) > 0) {
                $kelulusan->delete();
            }

            $tenant = Detail_user::where('id_detail', $id_tenant)->first();
            $nama = $tenant->nama_brand;
            $tenant->delete();
            User::where('id_user', $id_tenant)->first()->delete();
            return redirect()->route('admin.listTenants')->with('success', "Tenant '$nama' berhasil dihapus");
        } catch (\Throwable $th) {
            return redirect()->route('admin.listTenants')->with('error', "Tenant '$nama' gagal dihapus");
        }
    }

    public function exportToExcel($jenis_monev, $id_user)
    {
        $userdata = User::where('id_user', $id_user)->first();
        $file_name = $userdata->hasDetail->nama_brand . '_' . 'Monev' . '_' . ucwords($jenis_monev) . '.xlsx';
        if ($jenis_monev == 'kas') {
            try {
                $kas = Monev_Finansial::where('id_user', $id_user)->get();
                $file_name = $userdata->hasDetail->nama_brand . '_' . 'Buku Kas' . '_' . ucwords($jenis_monev) . '.xlsx';
                if (count($kas) == 0) {
                    throw new Exception('not found');
                }
                return Excel::download(new KasAdminExport($id_user), $file_name);
            } catch (\Throwable $th) {
                return abort(404);
            }
        }
        if ($jenis_monev == 'finansial') {
            try {
                $finansial = Monev_Finansial::orderBy('tanggal', 'DESC')->where('id_user', $id_user)->get();
                $data = $finansial->map(function ($item) {
                    return [
                        date('d/m/Y', strtotime($item['tanggal'])),
                        $item['jenis_transaksi'],
                        $item['keterangan_transaksi'],
                        $item['jumlah'],
                        date('d/m/Y', strtotime($item['created_at']))
                    ];
                });
                if (count($data) == 0) {
                    throw new Exception('not found', 1);
                }
                return Excel::download(new MonevExport($data->toArray(), true), $file_name);
            } catch (\Throwable $th) {
                return abort(404);
            }
        }
        try {
            $monev = Monev::orderBy('tanggal', 'DESC')->where('id_user', $id_user)->where('jenis_monev', $jenis_monev)->get();
            $data = $monev->map(function ($item) {
                return [
                    date('d/m/Y', strtotime($item['tanggal'])),
                    $item['status_progress'],
                    $item['uraian'],
                    $item['file'] ? 'Ada' : 'Tidak Ada',
                    $item['feedback'],
                    date('d/m/Y', strtotime($item['created_at']))
                ];
            });
            if (count($data) == 0) {
                throw new Exception('not found', 1);
            }
            return Excel::download(new MonevExport($data->toArray()), $file_name);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }

    public function exporttenant()
    {
        return Excel::download(new TenantExport, 'Data Seluruh Tenant.xlsx');
    }

    public function exporttim($id_user)
    {
        $dataUser = Detail_user::where('id_detail', $id_user)->first();
        return Excel::download(new TimExport($id_user), "$dataUser->nama_brand Profile Tim.xlsx");
    }

    public function exportLampiran($id_user)
    {
        $dataUser = Detail_user::where('id_detail', $id_user)->first();
        return Excel::download(new LampiranExport($id_user), "$dataUser->nama_brand Pencatatan Inkubasi.xlsx");
    }
    
    public function exportPrestasi($id_user)
    {
        $dataUser = Detail_user::where('id_detail', $id_user)->first();
        return Excel::download(new PrestasiExport($id_user), "$dataUser->nama_brand Prestasi.xlsx");
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
