<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Task;

class MarkAsCompletedAction extends BatchAction
{
    public $name = 'Mark as Completed';

    /**
     * Mark selected tasks as completed.
     */
    public function handle(Collection $tasks)
    {
        foreach ($tasks as $task) {
            $task->update(['status' => 'completed']);
        }

        return $this->response()->success('Selected tasks marked as completed.')->refresh();
    }

    /**
     * Show confirmation dialog before running the action.
     */
    public function dialog()
    {
        $this->confirm('Are you sure you want to mark these tasks as completed?');
    }
}
