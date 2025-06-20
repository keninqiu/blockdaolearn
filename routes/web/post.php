<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('posts', [PostController::class, 'all']);
Route::get('posts/{slug}', [PostController::class, 'allByCategory']);
Route::get('post/{slug}', [PostController::class, 'single']);