<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

require base_path('routes/admin.php');


Route::get('/', function () {
    return view('welcome');
});

// Resource routes for tasks, categories, and tags
Route::resource('tasks', TaskController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);

