<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Creating tasks
        $task1 = Task::create([
            'title' => 'Complete this project',
            'description' => 'Finish my first Laravel project.',
            'due_date' => now()->addDays(7),
            'status' => 'pending',
            'category_id' => Category::where('name', 'Very Important')->first()->id,
        ]);

        $task2 = Task::create([
            'title' => 'Meeting with Tarik',
            'description' => 'Discuss the project progress and next steps.',
            'due_date' => now()->addDays(3),
            'status' => 'pending',
            'category_id' => Category::where('name', 'Personal')->first()->id,
        ]);

        $task3 = Task::create([
            'title' => 'Study',
            'description' => 'Study for an exam.',
            'due_date' => now()->addWeek(),
            'status' => 'pending',
            'category_id' => Category::where('name', 'Can wait')->first()->id,
        ]);

        // Attaching tags to the tasks
        $task1->tags()->attach([1, 2]); // Attach 'Urgent' and 'Important' tags to task1
        $task2->tags()->attach([2, 1]); // Attach 'Important' and 'Urgent' tags to task2
        $task3->tags()->attach([3]); // Attach 'Optional' tag to task3
    }
}
