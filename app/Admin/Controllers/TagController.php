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

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Tag Name'))->editable(); // Inline editing

        return $grid;
    }

    /**
     * Tag form for creating/editing.
     */
    protected function form()
    {
        $form = new Form(new Tag());

        $form->text('name', __('Tag Name'))->required();

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
