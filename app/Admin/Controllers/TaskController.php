<?php

namespace App\Admin\Controllers;

use App\Models\Task;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use App\Admin\Actions\MarkAsCompletedAction;

class TaskController extends AdminController
{
    protected function title()
    {
        return 'Tasks';
    }

    /**
     * Task table in the admin panel.
     */
    protected function grid()
    {
        $grid = new Grid(new Task());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('title', __('Title'))->editable(); // Inline editing

        // Status with colored labels
        $grid->column('status', __('Status'))
            ->using([
                'pending' => 'Pending',
                'completed' => 'Completed'
            ])
            ->label([
                'pending' => 'warning', 
                'completed' => 'success'
            ]);

        // Show category name instead of ID
        $grid->column('category_id', __('Category'))->display(function ($categoryId) {
            return Category::find($categoryId)->name ?? 'Uncategorized';
        });

        // Filters
        $grid->filter(function ($filter) {
            $filter->like('title', 'Title');
            $filter->equal('status', 'Status')->select([
                'pending' => 'Pending',
                'completed' => 'Completed',
            ]);
        });

        // Bulk action to mark tasks as completed
        $grid->batchActions(function ($batch) {
            $batch->add(new MarkAsCompletedAction());
        });

        return $grid;
    }

    /**
     * Task form for creating/editing.
     */
    protected function form()
    {
        $form = new Form(new Task());

        $form->text('title', __('Title'))->required();
        
        $form->textarea('description', __('Description'))
            ->placeholder('Enter task details...')
            ->required();

        $form->select('category_id', __('Category'))
            ->options(Category::pluck('name', 'id'))
            ->required();

        $form->date('due_date', __('Due Date'))
            ->default(date('Y-m-d'));

        $form->radio('status', __('Status'))
            ->options([
                'pending' => 'Pending',
                'completed' => 'Completed'
            ])
            ->default('pending');

        return $form;
    }

    /**
     * Detailed view of a task.
     */
    protected function detail($id)
    {
        $show = new Show(Task::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('Title'));
        $show->field('status', __('Status'));
        $show->field('category_id', __('Category'))->as(function ($categoryId) {
            return Category::find($categoryId)->name ?? 'Uncategorized';
        });

        return $show;
    }
}
