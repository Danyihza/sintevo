<?php

namespace App\Http\Controllers\Api;

use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class Data extends Controller {

    public function getProdi()
    {
        $result = Prodi::all();
        return response()->json($result, 200);
    }
}