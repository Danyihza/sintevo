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

    public function checkPassword(Request $request)
    {
        $id = $request->id_user;
        $current_password = hash('sha256', $request->password);
        $password = User::where('id_user', $id)->first()->password;

        if (!$password) {
            return response()->json([
                'status' => 'error',
                'message' => 'not found'
            ], 200);
        }

        if ($current_password == $password) {   
            return response()->json([
                'status' => 'success',
                'data' => true
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'data' => false
            ],200);
        }
    }
}