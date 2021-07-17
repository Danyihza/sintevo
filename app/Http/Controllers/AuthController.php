<?php

namespace App\Http\Controllers;

use App\Models\Detail_user;
use App\Models\Kategori;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    public function signup()
    {
        $data['kategori'] = Kategori::all(); // SELECT * FROM kategori;
        $data['status'] = Status::all();
        $data['prodi'] = Prodi::all();
        return view('signup', $data);
    }

    public function signup2(Request $request)
    {
        if ($request->method() != 'POST') {
            return redirect('signup');
        }
        $data['input'] = $request->except(['_token']);
        // dd($input);
        // session(['form-data' => $input]);
        return view('signup2', $data);
    }

    public function registration(Request $request)
    {
        $status = $request->status;
        $prodi = $request->prodi;
        $kategori = $request->kategori;
        $nama_brand = $request->nama_brand;
        $deskripsi = $request->deskripsi;
        $alamat = $request->alamat;
        $nama_ketua = $request->nama_ketua;
        $no_whatsapp = $request->no_whatsapp;
        $website = $request->website;
        $instagram = $request->instagram;

        try {
            // $form = session()->get('form-data');
            $user = $request->except(['conf_password', '_token']);
            $id = User::generateId($status);
            $id_detail = $id;

            $user['id_user'] = $id;
            $user['password'] = hash('sha256', $user['password']);
            $user['role'] = (int) $status;
            $user['token'] = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 1, 8);

            User::create($user);
            // Detail_user::create($form);
            $newDetailUser = new Detail_user;
            $newDetailUser->id_detail = $id_detail;
            $newDetailUser->status = $status;
            $newDetailUser->prodi = $prodi;
            $newDetailUser->kategori = $kategori;
            $newDetailUser->nama_brand = $nama_brand;
            $newDetailUser->deskripsi = $deskripsi;
            $newDetailUser->alamat = $alamat;
            $newDetailUser->nama_ketua = $nama_ketua;
            $newDetailUser->no_whatsapp = $no_whatsapp;
            $newDetailUser->website = $website;
            $newDetailUser->instagram = $instagram;
            $newDetailUser->save();
            return redirect('login')->with('success', 'Please Login to Continue');
        } catch (\Throwable $th) {
            return redirect()->route('signup')->with('error','Ada kesalahan server silahkan ulangi pendaftaran');
        }
    }

    public function test()
    {
        $data = User::generateId(1);
        dd($data);
    }

    public function login()
    {
        return view('login');
    }

    public function signout()
    {
        session()->forget('login-data');
        return redirect('login');
    }

    public function signin(Request $request)
    {
        $input = $request->all();
        $data = User::where('email', $input['email'])->first();
        if ($data) {
            if ($data->password === hash('sha256', $input['password'])) {
                $dataLogin = [
                    'id' => $data->id_user,
                    'email' => $data->email,
                    'role' => $data->role
                ];
                session(['login-data' => $dataLogin]);
                switch ($data->role) {
                    case 2:
                        return redirect('tenant/home');
                        break;
                    case 1:
                        return redirect('admin/dashboard');
                        break;
                    case 0:
                        return redirect('admin/dashboard');
                        break;

                    default:
                        return abort(404);
                        break;
                }
            } else {
                return redirect('login')->with('error', 'Wrong password');
            }
        } else {
            return redirect('login')->with('error', 'User Not Found');
        }
    }

    public function changePassword(Request $request)
    {
        $id_user = session('login-data')['id'];
        $user = User::where('id_user', $id_user)->first();
        $curr_password = hash('sha256', $request->current_password);
        $new_password = $request->new_password;
        if ($curr_password != $user->password) {
            return Redirect::back()->with('error', 'Current Password does not match');
        }

        $user->password = hash('sha256', $new_password);
        $user->save();
        return Redirect::back()->with('success', 'Password has been updated');
    }
}
