<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 5)),
            'slug' => $this->faker->slug(mt_rand(2,5)),
            'excerpt' => $this->faker->paragraph(mt_rand(2, 3)),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(function($value) {
                return '<p>' . $value . '</p>';
            })->implode(' '),
            'user_id' => $this->faker->numberBetween(2, 5)
        ];
    }
}
