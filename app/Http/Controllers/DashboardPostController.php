<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\DashboardPostRequest;

class DashboardPostController extends Controller
{
    public function index()
    {
        return view('Dashboard.Posts.index', [
            'posts' => Post::latest()->whereUserId(Auth::user()->id)->get()
        ]);
    }

    public function create()
    {
        return view('Dashboard.Posts.create', [
            'categories' => Category::orderBy('title_category')->get()
        ]);
    }

    public function store(DashboardPostRequest $request)
    {
        try {
            DB::beginTransaction();
            $namaGambar = $this->upload($request->file('gambar')) ?? false;

            $userLogin = User::whereId(Auth::user()->id)->first();
            $post = $userLogin->posts()->create([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-' . rand(1, 9),
                'excerpt' => strip_tags(Str::limit($request->body, 20)),
                'body' => $request->body,
                'gambar' => $namaGambar
            ]);

            $post->categories()->sync($request->category);

            DB::commit();
        } catch (Exception $error) {
            DB::rollBack();
            return redirect()->route('dashboard.post.index')->with('failed', 'Gagal Menambah Post');
        }

        return redirect()->route('dashboard.post.index')->with('success', 'Berhasil Menambah Post');
    }

    public function show(Post $post)
    {
        return view('Dashboard.Posts.show', [
            'post' => $post,
            'comments' => $post->commentsPost()
        ]);
    }

    public function edit(Post $post)
    {
        return view('Dashboard.Posts.edit', [
            'post' => $post,
            'categories' => Category::orderBy('title_category')->get()
        ]);
    }

    public function update(DashboardPostRequest $request, Post $post)
    {
        if(Auth::user()->id != $post->user_id) {
            abort(403);
        }

        try {
            DB::beginTransaction();
            if($request->title != $post->title) {
                if(Post::whereTitle($request->title)->first()) {
                    return back()->with('title', 'Title Sudah ada');
                }
            }

            if($request->hasFile('gambar')) {
                File::delete('images/' . $post->gambar);
                $namaGambar = $this->upload($request->file('gambar')) ?? false;
            }

            $post->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title) . '-' . rand(1, 9),
                'excerpt' => strip_tags(Str::limit($request->body, 20)),
                'body' => $request->body,
                'gambar' => $namaGambar ?? $post->gambar
            ]);

            $post->categories()->sync($request->category);

            DB::commit();
        } catch (Exception $error) {
            DB::rollBack();
            return redirect()->route('dashboard.post.index')->with('failed', 'Gagal Update Post');
        }

        return redirect()->route('dashboard.post.index')->with('success', 'Berhasil Update Post');
    }

    public function destroy(Post $post)
    {
        if(Auth::user()->id != $post->user_id) {
            abort(403);
        }

        File::delete('images/' . $post->gambar);

        $post->delete();

        return redirect()->route('dashboard.post.index')->with('success', 'Berhasil Hapus Post');
    }

    public function upload($gambar): string
    {
        $extensiGambar = $gambar->getClientOriginalExtension();
        $namaFile = 'pots-' . time() . '.' . $extensiGambar;

        $gambar->move('images', $namaFile);
        return $namaFile;
    }
}
