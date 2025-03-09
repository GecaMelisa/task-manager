<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    protected function title()
    {
        return 'Categories';
    }

    /**
     * Category table in the admin panel.
     */
    protected function grid()
    {
        $grid = new Grid(new Category());
    
        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'))->editable();
    
        // Fiter Categories by name
        $grid->filter(function ($filter) {
            $filter->disableIdFilter(); // Ensure the ID filter is removed
            $filter->like('name', 'Name'); 
        });
    
        return $grid;
    }
    
    

    /**
     * Category form for creating/editing.
     */
    protected function form()
    {
        $form = new Form(new Category());

        $form->text('name', __('Category Name'))->required();

        // Disable additional options
        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();

        return $form;
    }

    /**
     * Detailed view of a category.
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));

        return $show;
    }
}
