<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', [CourseController::class, 'all']);
Route::get('courses', [CourseController::class, 'all']);
Route::get('courses/{slug}', [CourseController::class, 'allByCategory']);
Route::get('course/{slug}', [CourseController::class, 'single']);