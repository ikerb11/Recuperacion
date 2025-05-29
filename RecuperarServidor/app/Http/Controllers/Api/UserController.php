<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::with(['posts', 'profile'])->find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'No se encontró el usuario'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'Usuario encontrado'
        ], 200);

    }
}
