<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function comment(Request $request, Post $post, ?User $user = null)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required'
        ], [
            'required' => 'Isi Comment Terlebih dahulu'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validate = $validator->validated();

        $post->comments()->create([
            'comment' => $validate['comment'],
            'user_id' => $user->id
        ]);

        return redirect()->route('blogs.show', ['post' => $post->slug]);
    }
}
