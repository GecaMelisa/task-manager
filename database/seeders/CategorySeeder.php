<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Very Important'],
            ['name' => 'Personal'],
            ['name' => 'Can Wait'],
        ];

        // Insert categories only if they don't exist to prevent duplicates
        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}
