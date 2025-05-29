<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function test()
    {
        return response()->json(['message' => 'API funcionando']);
    }

    public function saludo()
    {
        return response()->json(['mensaje' => 'Hola desde la API'], 200);
    }

    public function saludoNombre($nombre)
    {
        return response()->json(['mensaje' => "Hola, $nombre"], 200);
    }

    public function secureTest()
    {
        return response()->json(['message' => 'Token válido']);
    }
}

