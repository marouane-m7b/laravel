<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|min:3|max:15',
            'contenu' => 'required|min:10|max:150',
            'image' => 'image|mimes:png,jpg,jpeg'
        ]);

        $post = new Post();
        if ($request->hasFile('image')) {
            Storage::disk('public')->put('image/' . time() . '.' . $request->file('image')->getClientOriginalExtension(), file_get_contents($request->file('image')));
            $post->image = time() . '.' . $request->file('image')->getClientOriginalExtension();
        }

        $post->titre = $request->titre;
        $post->contenu = $request->contenu;
        $post->save();

        return response()->json(["message" => "creation successufly de post"]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (!Post::find($id)) {
            return response()->json(["message" => "post not found"], 404);
        }
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if (!Post::find($id)) {
            return response()->json(["message" => "post not found"], 404);
        }

        $request->validate([
            'titre' => 'required|min:3|max:15',
            'contenu' => 'required|min:10|max:150'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('image/' . $post->image);
            Storage::disk('public')->put('image/' . time() . '.' . $request->file('image')->getClientOriginalExtension(), file_get_contents($request->file('image')));
            $post->image = time() . '.' . $request->file('image')->getClientOriginalExtension();
        }

        $post->titre = $request->titre;
        $post->contenu = $request->contenu;
        $post->save();

        return response()->json(["message" => "Updated successufly de post"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!Post::find($id)) {
            return response()->json(["message" => "post not found"], 404);
        }

        Storage::disk('public')->delete('image/' . $post->image);
        $post->delete();

        return response()->json(["message" => "Deleted successufly de post"]);
    }
}
