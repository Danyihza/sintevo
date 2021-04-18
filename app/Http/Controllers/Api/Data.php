<?php

namespace App\Http\Controllers\Api;

use App\Models\Anggota;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class Data extends Controller {

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
}