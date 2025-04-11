<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\PostController;

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

Route::group([], function ($router) {
    Route::get('languages', [LanguageController::class, 'all']);
});
Route::group([], function ($router) {
    Route::get('languages/{code}', [LanguageController::class, 'getByCode']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('languages', [LanguageController::class, 'create'])->middleware(['role:admin']);
    Route::post('languages/{id}', [LanguageController::class, 'update'])->middleware(['role:admin']);
});

Route::group([], function ($router) {
    Route::get('posts', [PostController::class, 'all']);
});

Route::group([], function ($router) {
    Route::get('posts/{id}', [PostController::class, 'getById']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('posts', [PostController::class, 'create']);
    Route::post('posts/{id}', [PostController::class, 'update']);
});