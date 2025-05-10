<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/telegram', [HomeController::class, 'telegram']);
Route::get('/faucets', [HomeController::class, 'faucets']);