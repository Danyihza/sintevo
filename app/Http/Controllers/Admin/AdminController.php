<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuperAdmin');
    }

    public function index()
    {
        $data['title'] = 'adminmanagement';
        $data['admin'] = User::where('role', 1)->get();
        return view('admin.adminmanagement', $data);
    }

    public function addAdmin(Request $request)
    {
        try {
            $id_user = User::generateId(1);
            $admin = new User;
            $admin->id_user = $id_user;
            $admin->email = $request->username;
            $admin->password = hash('sha256', $request->password);
            $admin->role = 1;
            $admin->save();
            return Redirect::back()->with('success', "Admin dengan email/username '$request->username' berhasil didaftarkan");
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong " . $th->getMessage());
        }
    }

    public function removeAdmin($id_user)
    {
        try {
            $admin = User::where('id_user', $id_user)->first();
            $admin->delete();
            return Redirect::back()->with('success', "Admin dengan email/username '$admin->email' berhasil dihapus");
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong " . $th->getMessage());
        }
    }
}
