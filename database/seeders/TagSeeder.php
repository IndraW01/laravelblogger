<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'title_tag' => 'React JS',
            'slug_tag' => Str::slug('React JS')
        ]);
        Tag::create([
            'title_tag' => 'Laraval',
            'slug_tag' => Str::slug('Laraval')
        ]);
        Tag::create([
            'title_tag' => 'Bootstrap 5',
            'slug_tag' => Str::slug('Bootstrap 5')
        ]);
        Tag::create([
            'title_tag' => 'Vue JS',
            'slug_tag' => Str::slug('Vue JS')
        ]);
        Tag::create([
            'title_tag' => 'Holiday',
            'slug_tag' => Str::slug('Holiday')
        ]);
    }
}
