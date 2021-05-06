<?php

namespace App\Http\Controllers\Api;

use App\Models\Anggota;
use App\Models\Monev;
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

    public function addFeedback(Request $request)
    {
        $id_monev = $request->id;
        $feedback = $request->feedback;

        try {
            $monev = Monev::where('id_monev', $id_monev)->first();
            $monev->feedback = $feedback;
            $monev->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Updated'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}