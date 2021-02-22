<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = User::all();
        return view('home', $data);
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $data = User::where('email', $input['email'])->first();
        if ($data) {
            if ($data->password === $input['password']) {
                session([
                    'id' => $data->id,
                    'name' => $data->name,
                    'email' => $data->email
                ]);
                return redirect('home');
            } else {
                return redirect('login')->with('error', 'Wrong password');
            }
        } else {
            return redirect('login')->with('error', 'User Not Found');
        }
    }

    public function store()
    {
        User::create([
            'email' => 'danyihza99@gmail.com',
            'name' => 'Dany Ahmad',
            'password' => '11223344'
        ]);

        echo 'Success';
    }
}
