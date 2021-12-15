<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('Blogs.index', [
            'posts' => Post::latest()->paginate(7)->withQueryString(),
            'latestPosts' => Post::latest()->take(3)->get()
        ]);
    }
}
