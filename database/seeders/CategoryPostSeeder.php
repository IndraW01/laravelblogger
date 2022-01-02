<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $categories = Category::all();

        $posts->each(function($post) use ($categories) {
            $post->categories()->attach($categories->random(rand(1, 3)));
        });

    }
}
