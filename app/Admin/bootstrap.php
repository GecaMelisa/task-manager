<?php

use Encore\Admin\Facades\Admin;

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

/*
// Correctly add a menu item
Menu::make('Tasks', function ($menu) {
    $menu->add([
        'title' => 'Tasks',
        'icon'  => 'fa-tasks',
        'uri'   => 'tasks',
    ]);
});
*/
// Forget unwanted form fields (if needed)
Encore\Admin\Form::forget(['map', 'editor']);

