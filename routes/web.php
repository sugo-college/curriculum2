<?php

use Illuminate\Support\Facades\Route;
//  

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'PostController@index');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/{post}', 'PostController@show');
    Route::put('/posts/{post}', 'PostController@update');
    Route::delete('posts/{post}', 'PostController@delete');
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::get('/categories/{category}', 'CategoryController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
