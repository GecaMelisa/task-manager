<?php

namespace App\Admin\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Models\Tag; 
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

        // Show associated tags
        $grid->column('tags', __('Tags'))->display(function ($tags) {
            return implode(', ', array_column($tags, 'name'));
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

        // Multiple select field for tags
        $form->multipleSelect('tags', __('Tags'))
            ->options(Tag::pluck('name', 'id'));

        $form->date('due_date', __('Due Date'))
            ->default(date('Y-m-d'));

        $form->radio('status', __('Status'))
            ->options([
                'pending' => 'Pending',
                'completed' => 'Completed'
            ])
            ->default('pending');

            // Disable footer options
            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->disableCreatingCheck();


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

        // Show associated tags in detail view
        $show->field('tags', __('Tags'))->as(function ($tags) {
            return implode(', ', $tags->pluck('name')->toArray());
        });

        return $show;
    }
}
