<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Detail_user;
use App\Models\Kategori;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Anggota::create([
            'id_user' => 'DOS0001',
            'nama' => 'Dany Ahmad Ihza Prakoso',
            'status' => 1,
            'prodi' => 3,
            'no_identify' => 12124213,
            'jabatan' => 'CEO'
        ],[
            'id_user' => 'DOS0001',
            'nama' => 'Joko Santoso',
            'status' => 3,
            'no_identify' => 454545,
            'jabatan' => 'CEO'
        ],[
            'id_user' => 'DOS0001',
            'nama' => 'Kurniawan',
            'status' => 3,
            'no_identify' => 1122334455,
            'jabatan' => 'CFO'
        ]);

        Detail_user::create([
            'id_detail' => 'DOS0001',
            'kategori' => 3,
            'nama_brand' => 'Aftermeet Academy 2.0',
            'deskripsi' => 'testing',
            'alamat' => 'Desa Rondokuning Kraksaan Kabupaten Probolinggo Jawa Timur',
            'nama_ketua' => 'Dany Ahmad',
            'no_whatsapp' => '082331147549',
            'status' => 2,
            'website' => 'www.mediarraihan.com',
            'instagram' => '@danyihza'
        ]);

        $kategori =[
            'Pangan',
            'Energi',
            'Rekayasa Keteknikan',
            'Biomedis',
            'Material Maju',
            'Sosial & Budaya',
            'Transportasi',
            'Material',
            'Pertahanan'
        ];

        foreach($kategori as $ktg){
            Kategori::create([
                'nama_kategori' => $ktg
            ]);
        }

        $prodi = [
            'D3 Teknik Perancangan dan Konstruksi Kapal',
            'D3 Teknik Bangunan Kapal',
            'D3 Teknik Permesinan Kapal',
            'D3 Teknik Kelistrikan Kapal',
            'D4 Teknik Pengelasan',
            'D4 Teknik Perancangan dan Konstruksi Kapal',
            'D4 Teknik Perpipaan',
            'D4 Teknik Permesinan Kapal',
            'D4 Teknik Otomasi',
            'D4 Teknik Kelistrikan Kapal',
            'D4 Teknik Keselamatan dan Kesehatan Kerja',
            'D4 Teknik Pengolahan Limbah',
            'D4 Teknik Desain dan Manufaktur',
            'D4 Manajemen Bisnis'
        ];

        foreach ($prodi as $prd) {
            Prodi::create([
                'nama_prodi' => $prd 
            ]);
        }

        $status = [
            'Mahasiswa',
            'Dosen',
            'Alumni',
            'Mitra'
        ];

        foreach($status as $sts) {
            Status::create([
                'jenis_status' => $sts
            ]);
        }

        User::create([
            'id_user' => 'DOS0001',
            'email' => 'google@gmail.com',
            'password' => hash('sha256', '321'),
            'role' => 2,
            'token' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),1,8)
        ],[
            'id_user' => 'MHS001',
            'email' => 'danyahmadihza99@gmail.com',
            'password' => hash('sha256', '123'),
            'role' => 1,
            'token' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),1,8)
        ]);
    }
}
