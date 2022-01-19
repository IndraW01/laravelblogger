<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('Blogs.index', [
            'posts' => Post::latest()->has('user')->has('categories')->filter($request->all())->paginate(6)->withQueryString(),
            'latestPosts' => Post::latest()->take(3)->get(),
            'categories' => Category::orderBy('title_category', 'ASC')->get(),
            'index' => true
        ]);
    }

    public function show(Post $post)
    {

        return view('Blogs.show', [
            'post' => $post->loadCount('comments'),
            'comments' => $post->comments()->with('user')->get()
        ]);
    }
}
