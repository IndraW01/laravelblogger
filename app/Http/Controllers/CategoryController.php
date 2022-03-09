<?php

namespace App\Http\Controllers;

use App\Models\category;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(category::class, 'category');
    }

    public function index()
    {
        // $this->authorize('viewAny', category::class);

        return view('Dashboard.Categories.index', [
            'categories' => category::orderBy('title_category')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jumlah()
    {
        return view('Dashboard.Categories.jumlah');
    }

    public function create(Request $request)
    {
        if($request->query('jumlah') > 5) {
            return redirect()->route('dashboard.category.jumlah');
        }
        return view('Dashboard.Categories.create', [
            'jumlah' => $request->jumlah
        ]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            for($i = 1; $i <= $request->jumlah; $i++) {
                if($request->input("title-" . $i) == null) {
                    return back()->with('failed', 'Title Category Harus diisi');
                } else if(category::whereTitleCategory($request->input('title-' . $i))->exists()) {
                    return back()->with('failed', 'Title Category Sudah Ada');
                }
                category::create([
                    'title_category' => $request->input('title-' . $i),
                    'slug_category' => Str::slug($request->input('title-' . $i)),
                ]);
            }

            DB::commit();
            return redirect()->route('dashboard.category.index')->with('success', 'Berhasil Menambah Category');
            } catch (Exception $e) {
                DB::rollBack();
                echo $e->getMessage();
            }

    }

    public function edit(category $category)
    {
        return view('Dashboard.Categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'title' => 'required|unique:categories,title_category,' . $category->id
        ]);

        $category->update([
            'title_category' => $request->title,
            'slug_category' => Str::slug($request->title),
        ]);

        return redirect()->route('dashboard.category.index')->with('success', 'Berhasil Update Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();

        return redirect()->route('dashboard.category.index')->with('success', 'Berhasil Hapus Category');
    }
}
