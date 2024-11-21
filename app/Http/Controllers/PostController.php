<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index () {
        $posts = Post::all();
        return view ('posts.index' , compact('posts'));
    }

    public function create () {
        return view('posts.create');
    }

    public function store (Request $request) {

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName() . "-" . time() . $request->file('image')->getClientOriginalExtension() ;
            $request->file('image')->move(public_path("/images/posts") , $imageName);
        }

        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $imageName
        ]);

        return redirect()->route("posts.index");
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName() . "-" . time() . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path("/images/posts"), $imageName);
        }

        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imageName ?? $post->image
        ]);

        return redirect()->route("posts.index");
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index");
    }


}
