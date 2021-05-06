<?php

namespace App\Http\Controllers;

use App\Models\Detail_user;
use App\Models\Kategori;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

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
        $input = $request->except(['_token']);
        session(['form-data' => $input]);
        return view('signup2');
    }

    public function registration(Request $request)
    {
        $form = session()->get('form-data');
        $user = $request->except(['conf_password', '_token']);
        $id = User::generateId($form['status']);
        $form['id_detail'] = $id;

        $user['id_user'] = $id;
        $user['password'] = hash('sha256', $user['password']);
        $user['role'] = (int) $form['status'];
        $user['token'] = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 1, 8);

        User::create($user);
        Detail_user::create($form);
        session()->forget('form-data');
        return redirect('login')->with('success', 'Please Login to Continue');
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
        return redirect('/home');
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
}
