<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    </head>
    
    <body>
        @extends('layouts.app')
        @section('content')
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        
        <h1 class = "title">
            {{ $post->title }}
        </h1>
        
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        
        <h1>画像</h1>
        <img src="{{ $post->image }}" class = 'image_size'>
        
        <div class = "content">
            <div class = "content_post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>
            </div>
        </div>
        <div class = "footer">
            <a href = "/">戻る</a>
        </div>
        @endsection
    </body>
</html>
