<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;
use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        try {
            // Fetching counts
            $taskCount = Task::count();
            $categoryCount = Category::count();
            $tagCount = Tag::count();
        } catch (\Exception $e) {
            // Handle potential database connection issues gracefully
            $taskCount = 0;
            $categoryCount = 0;
            $tagCount = 0;
        }

        return $content
            ->title('Dashboard')
            ->description('Overview of Tasks, Categories, and Tags')
            ->row(function (Row $row) use ($taskCount, $categoryCount, $tagCount) {
                // Tasks InfoBox
                $row->column(4, new InfoBox('Tasks', 'list', 'blue', '/admin/tasks', $taskCount));
                
                // Categories InfoBox
                $row->column(4, new InfoBox('Categories', 'folder', 'green', '/admin/categories', $categoryCount));
                
                // Tags InfoBox
                $row->column(4, new InfoBox('Tags', 'tags', 'red', '/admin/tags', $tagCount));
            })
            
            ->row('<p>Welcome to your admin panel!</p>');
    }
}
