<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Urgent'],
            ['name' => 'Important'],
            ['name' => 'Optional'],
        ];

        // Insert tags only if they don't exist to prevent duplicates
        foreach ($tags as $tag) {
            Tag::firstOrCreate($tag);
        }
    }
}
