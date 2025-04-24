<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiniController;

Route::get('minis', [MiniController::class, 'all']);
Route::get('mini/{slug}', [MiniController::class, 'single']);