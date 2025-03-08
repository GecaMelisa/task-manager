<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Tag;

class TagTaskSeeder extends Seeder
{
    /**
     * Seed the tag_task pivot table.
     *
     * @return void
     */
    public function run(): void
    {
        // Fetch some existing tasks and tags
        $task1 = Task::find(1); // Find task with ID 1 (adjust accordingly)
        $task2 = Task::find(2); // Find task with ID 2 (adjust accordingly)

        $tag1 = Tag::find(1); // Find tag with ID 1 (adjust accordingly)
        $tag2 = Tag::find(2); // Find tag with ID 2 (adjust accordingly)

        // Attach tags to tasks (create many-to-many relationship in pivot table)
        $task1->tags()->attach([$tag1->id, $tag2->id]); // Attach tags to task 1
        $task2->tags()->attach([$tag1->id]); // Attach a single tag to task 2
    }
}
