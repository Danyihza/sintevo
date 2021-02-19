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
