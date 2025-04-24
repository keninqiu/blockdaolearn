<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

Route::group([], function ($router) {
    Route::get('posts', [PostController::class, 'all']);
    Route::get('posts/{slug}', [PostController::class, 'getBySlug']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('posts', [PostController::class, 'create']);
    Route::post('posts/{id}', [PostController::class, 'update']);
});
