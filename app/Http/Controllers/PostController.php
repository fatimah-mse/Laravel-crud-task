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

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imageName = $img->getClientOriginalName() . "-" . time() . $img->getClientOriginalExtension() ;
                $img->move(public_path("/images/posts") , $imageName);
                array_push($images , $imageName);
            }
        }

        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => json_encode($images)
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
        

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $img) {
                $imageName = $img->getClientOriginalName() . "-" . time() . $img->getClientOriginalExtension() ;
                $img->move(public_path("/images/posts") , $imageName);
                array_push($images , $imageName);
            }
        }

        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $images ?? $post->image
        ]);

        return redirect()->route("posts.index");
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index");
    }


}
