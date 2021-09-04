<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('index')->with(['posts'=> $post->getPaginateByLimit()]);
    }
    public function show(Post $post)
    {
        return view('show')->with(['post'=> $post]);
    }
    public function create()
    {
        return view('create');
    }
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
    {
        return view('edit')->with(['post'=>$post]);
    }
}
