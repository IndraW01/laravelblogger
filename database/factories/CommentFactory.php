<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentence(mt_rand(5, 10)),
            'post_id' => $this->faker->unique()->randomElement(Post::all()->sortBy('id')->pluck('id'))
        ];
    }
}
