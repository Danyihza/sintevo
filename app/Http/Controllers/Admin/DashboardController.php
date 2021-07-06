<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use App\Models\Detail_user;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'dashboard';
        $data['jumlah_tenant'] = Detail_user::count();
        $data['jumlah_admin'] = User::where('role', 1)->count();
        $data['informasi'] = Dashboard::latest()->first();
        // dd($data['informasi']);
        return view('admin.dashboard', $data);
    }

    public function updateinformasidashboard(Request $request)
    {
        try {
            $peng = Dashboard::count();
            if ($peng < 1) {
                $new = new Dashboard;
                $new->file = self::_uploadFile($request, 'upload_file');
                $new->save();
                return Redirect::back()->with('success', 'Informasi pada dashboard tenant telah diperbarui');
            }
            $dashboard = Dashboard::latest()->first();
            FacadesFile::delete($dashboard->hasFile->path_file);
            File::where('id_file', $dashboard->file)->first()->delete();
            $dashboard->file = self::_uploadFile($request, 'upload_file');
            $dashboard->save();
            return Redirect::back()->with('success', 'Informasi pada dashboard telah diperbarui');
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', $th->getMessage());
        }
    }

    private static function _uploadFile($request, $upload_name)
    {
        try {
            $upload = $request->file($upload_name);
            $file = new File();
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
