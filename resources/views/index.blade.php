<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    
    <body>
        @extends('layouts.app')
        
        @section('content')
        
        
        <h1>Blog Name</h1>
        
        [<a href='/posts/create'>create</a>]
        <div class = 'posts'>
            @foreach($posts as $post)
            <div class = 'post'>
                <h2 class = 'title'> 
                    <a href = "posts/{{ $post->id }}">{{ $post->title }} </a>
                </h2>
                
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <p class = 'body'>{{ $post->body }} </p>
            </div>
            
            <form action = "/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="deisplay:inline">
                @csrf
                @method('DELETE')
                <button type = "submit">delete</button>
            </form>
            
            @endforeach
        </div>
        <div class = 'paginate'>
            {{ $posts->links() }}
        </div>
        @endsection
    </body>
</html>
