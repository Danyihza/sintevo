<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class Auth extends Controller {

    public function getEmail(Request $request)
    {
        $email = $request->email;
        $result = User::where('email', $email)->first();
        if ($result) {
            return response()->json($result, 200);
        }
        
        $response = [
            'message' => 'not found'
        ];
        return response()->json($response, 404);
    }
}