<?php

namespace App\Admin\Controllers;

use App\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TagController extends AdminController
{
    protected function title()
    {
        return 'Tags';
    }

    /**
     * Tag table in the admin panel.
     */
    protected function grid()
    {
        $grid = new Grid(new Tag());
    
        // Display columns
        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Tag Name'))->editable(); // Inline editing
    
        // Add filters
        $grid->filter(function ($filter) {
            $filter->like('name', 'Tag Name'); // Enables filtering by tag name
            $filter->disableIdFilter(); // Disables the default ID filter
        });
    
        return $grid;
    }
    

    /**
     * Tag form for creating/editing.
     */
    protected function form()
    {
        $form = new Form(new Tag());

        $form->text('name', __('Tag Name'))->required();

        // Disable checkboxes
        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();

        return $form;
    }

    /**
     * Detailed view of a tag.
     */
    protected function detail($id)
    {
        $show = new Show(Tag::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));

        return $show;
    }
}
