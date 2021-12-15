<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title_category' => 'Web Programming',
            'slug_category' => Str::slug('Web Programming')
        ]);
        Category::create([
            'title_category' => 'Web Design',
            'slug_category' => Str::slug('Web Design')
        ]);
        Category::create([
            'title_category' => 'Peronal',
            'slug_category' => Str::slug('Peronal')
        ]);
        Category::create([
            'title_category' => 'UI UX',
            'slug_category' => Str::slug('UI UX')
        ]);
    }
}
