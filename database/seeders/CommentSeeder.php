<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $posts = Post::all();

        $users->each(function($user) {
            $user->comments()->saveMany(
                Comment::factory()->count(rand(1, 3))->make()
            );
        });
    }
}
