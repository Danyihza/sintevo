<?php

namespace App\Http\Controllers\Api;

use App\Models\Anggota;
use App\Models\Faq;
use App\Models\File;
use App\Models\FileMonev;
use App\Models\Monev;
use App\Models\Monev_Finansial;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class Data extends Controller
{

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

    public function getAvatar($id_user)
    {
        $avatar = User::where('id_user', $id_user)->first();
        return response()->json([
            'status' => 'success',
            'data' => $avatar->hasDetail->gambar
        ], 200);
    }

    public function getpengumuman()
    {
        $announcement = Pengumuman::where('end_at', null)->orWhere('end_at', '>', date('Y-m-d H:i:s', time()))->get();
        return response()->json([
            'status' => 'success',
            'data' => $announcement
        ], 200);
    }

    public function getMonev($id_monev)
    {
        $monev = Monev::with('hasFile')->where('id_monev', $id_monev)->first();
        return response()->json([
            'status' => 'success',
            'data' => $monev
        ], 200);
    }

    public function getBukuKas($id_user)
    {
        try {
            $buku = Monev_Finansial::where('id_user', $id_user)->orderby('tanggal', 'ASC')->orderby('created_at', 'ASC')->get();
            $tanggal = $buku->map(function ($item) {
                return date('d/m/Y', strtotime($item['tanggal']));
            });
            if (count($tanggal) < 2) {
                throw new Exception('Data kurang');
            }
            $saldo = 0;
            $data['saldo'] = [];
            for ($i = 0; $i < count($buku); $i++) {
                if ($buku[$i]->jenis_transaksi == 'Pengeluaran') {
                    $saldo -= $buku[$i]->jumlah;
                    $data['saldo'][$i] = $saldo;
                } else {
                    $saldo += $buku[$i]->jumlah;
                    $data['saldo'][$i] = $saldo;
                }
            }
            $result = $data['saldo'];
            return response()->json([
                'status' => 'success',
                'data' => [
                    'saldo' => $result,
                    'tanggal' => $tanggal
                ]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'data' => $th->getMessage()
            ]);
        }
    }

    public function countPrestasi($id_user)
    {
        try {
            $prestasi = DB::table('prestasi')
                ->select('tingkat_prestasi', DB::raw('count(*) as total'))
                ->where('id_user', $id_user)
                ->groupBy('tingkat_prestasi')
                ->get();
            if (count($prestasi) == 0) {
                throw new Exception('Data not found');
            }
            $tingkat_prestasi = $prestasi->map(function ($item) {
                return $item->tingkat_prestasi;
            });
            $total = $prestasi->map(function ($item) {
                return $item->total;
            });
            // dd($tingkat_prestasi);
            return response()->json([
                'status' => 'success',
                'data' => [
                    'tingkat_prestasi' => $tingkat_prestasi,
                    'total' => $total
                ]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => $th->getMessage(),
            ], 404);
        }
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

    public function addFeedbackFaq(Request $request)
    {
        try {
            $id_faq = $request->id_faq;
            $tanggapan = $request->tanggapan;
            $faq = Faq::where('id_faq', $id_faq)->first();
            $faq->tanggapan = $tanggapan;
            $faq->save();
            return response()->json([
                'success' => true,
                'message' => 'Tanggapan Telah Ditambahkan'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal'
            ]);
        }
    }

    public function addFileMonevFeedback(Request $request)
    {
        $id_filemonev = $request->id;
        $feedback = $request->feedback;

        try {
            $fileMonev = FileMonev::where('id_filemonev', $id_filemonev)->first();
            $fileMonev->feedback = $feedback;
            $fileMonev->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Updated'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
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
