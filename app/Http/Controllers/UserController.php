<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Prodi;
use App\Models\Status;
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
        // $data = [
        //     'Pangan',
        //     'Energi',
        //     'Rekayasa Keteknikan',
        //     'Biomedis',
        //     'Material Maju',
        //     'Sosial & Budaya',
        //     'Transportasi',
        //     'Material',
        //     'Pertahanan'
        // ];

        // $data = [
        //     'D4 Manajemen Bisnis',
        //     'D4 Teknik Bangunan Kapal',
        //     'D4 Teknik K3',
        //     'D4 Teknik Permesinan Kapal'
        // ];

        $data = [
            'Mahasiswa',
            'Dosen',
            'Alumni',
            'Mitra'
        ];

        
        // foreach ($data as $value) {
            User::create([
                'id_user' => 'MHS0001',
                'email' => 'danyahmadihza99@gmail.com',
                'password' => hash('sha256', '11223344'),
                'role' => 1,
                'detail' => 1,
                'token' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,8)
            ]); 
        // }

        echo 'Success';
    }
}
