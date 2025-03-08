<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\HomeController;
use App\Admin\Controllers\TaskController;
use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\TagController;
use Encore\Admin\Facades\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),  
    'middleware' => config('admin.route.middleware'),  
    'namespace'  => config('admin.route.namespace'),
    'as'         => config('admin.route.prefix') . '.', 
], function () {
    
    // Admin Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

    // CRUD routes for managing tasks, categories, and tags
    Route::resource('tasks', TaskController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});
