<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/telegram', [HomeController::class, 'telegram']);
Route::get('/youtube', [HomeController::class, 'youtube']);
Route::get('/faucets', [HomeController::class, 'faucets']);