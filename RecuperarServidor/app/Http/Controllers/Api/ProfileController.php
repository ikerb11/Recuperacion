<?php

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return response()->json(Profile::all(), 200);
    }

    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return response()->json($profile, 200);
    }

    public function store(Request $request)
    {
        $profile = Profile::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $profile,
            'message' => 'Perfil creado'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $profile,
            'message' => 'Perfil actualizado'
        ], 200);
    }

    public function destroy($id)
    {
        Profile::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Perfil eliminado'
        ], 200);
    }
}

