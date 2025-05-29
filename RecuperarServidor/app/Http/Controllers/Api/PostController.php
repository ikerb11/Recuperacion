<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    
    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post, 200);
    }

    public function store(StorePostRequest $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'success' => true,
            'data' => $post,
            'message' => 'Post creado con éxito'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->only('title', 'content'));

        return response()->json([
            'success' => true,
            'data' => $post,
            'message' => 'Post actualizado'
        ], 200);
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post eliminado'
        ], 200);
    }
}

