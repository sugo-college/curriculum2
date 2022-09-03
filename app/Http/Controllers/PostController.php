<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
//use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //Post一覧を表示させる
    public function index(Post $post)
    {
        return view('index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show (Post $post)
    {
        return view('show')->with(['post' => $post]);
    }
    
    public function edit(Post $post)
    {
        return view('edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function create(Category $category)
    {
        return view('create')->with(['categories' => $category->get()]);
    }
    
    // public function store(PostRequest $request, Post $post)
    // {
    //     $input = $request['post'];
    //     $post->fill($input)->save();
    //     return redirect('/posts/' . $post->id);
    // }
    
    public function store(Request $request, Post $post)
    {
        $image = $request->file('image');
        
        $path = Storage::disk('s3')->putFile('costudy', $image, 'public');
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->image = Storage::disk('s3')->url($path);
        $post->save();
        
        // dd($post);
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
