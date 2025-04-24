<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('refresh', [UserController::class, 'refresh']);
    Route::post('me', [UserController::class, 'me']);
    
    Route::get('users', [UserController::class, 'all'])->middleware(['role:admin']);
    Route::get('users/{id}', [UserController::class, 'getById'])->middleware(['role:admin']);
    Route::post('users/{id}', [UserController::class, 'update'])->middleware(['role:admin']);
});

Route::group([], function ($router) {
    Route::post('login', [UserController::class, 'login']);
});