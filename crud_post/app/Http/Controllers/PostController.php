<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // $posts = Post::all();
        $posts = Post::paginate(3); // katjb les donner mn DB (5)

        return view('index', compact('posts'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $rules = $request->validate([
            'titre' => 'required|min:3|max:15',
            'contenu' => 'required|min:10|max:150',
            'image' => 'image|mimes:png,jpg,jpeg'
        ]);

        if ($request->hasFile('image')) {
           $image = $request->file('image');
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $image->move( public_path('image'),$imageName  );
           $rules['image'] = $imageName;
        }

        Post::create($rules);

        // session()->flash('message', 'creation successufly de post');
        return redirect()->route('posts')->with('message', 'creation successufly de post');
    }

    public function show($id) {
        $post = Post::find($id);

        return view('show', compact('post'));
    }

    public function edit($id) {
        $post = Post::find($id);

        return view('edit', compact('post'));
    }

    public function update(Request $request, $id) {
        $post = Post::find($id);

        $rules = $request->validate([
            'titre' => 'required|min:3|max:15',
            'contenu' => 'required|min:10|max:150'
        ]);

        $post->update($rules);

        return redirect()->route('posts')->with('message', 'updated successfully');
    }

    public function destroy($id) {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('posts')->with('message', 'deleted successfully');
    }
}
