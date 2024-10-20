<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get(' /about', function () {
    return view('about', ['title' => 'About']);
});

Route::get(' /posts', function () {
    //$posts = Post::with(['author','category'])->latest()->get();
    
    //$posts = Post::latest();
    
    //if(request('search')){
    //    $posts->where('title','like','%' . request('search') . '%');
    //}
    
    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search','category','author']))->latest()->paginate(5)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function(Post $post) {
    
        //$post =Post::find($id);

        return view('post',['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {
    
    //$post =Post::find($id);
    //$posts = $user->posts->load('category','author');
    return view('posts',['title' => count($user->posts) . '  Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    
    //$post =Post::find($id);
    //$posts = $category->posts->load('category','author');

    return view('posts',['title' => 'Articles in Category : ' . $category->name, 'posts' => $category->posts]);
});

Route::get(' /contact', function () {
    return view('contact', ['title' => 'Contact']);
});