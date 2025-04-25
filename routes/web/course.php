<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('courses', [CourseController::class, 'all']);
Route::get('course/{slug}', [CourseController::class, 'single']);