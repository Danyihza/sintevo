<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    public function accountPage()
    {
        $data['title'] = 'Account Setting';
        $data['account'] = User::where('id_user', session('login-data')['id'])->first();
        return view('admin.accountsetting', $data);
    }

    public function updateAdmin(Request $request)
    {
        // try {
            $id_user = $request->id_user;
            $admin = User::where('id_user', $id_user)->first();
            $current_password = hash('sha256', $request->current_password);
            if ($current_password != $admin->password) {
                throw new Exception('Password lama tidak sesuai');
            }
            $admin->email = $request->username;
            $admin->password = hash('sha256', $request->password);
            $admin->save();
            return Redirect::back()->with('success', 'Sukses Menambahkan Data');
        // } catch (\Throwable $th) {
        //     return Redirect::back()->with('error', $th->getMessage());
        // }
    }
}
