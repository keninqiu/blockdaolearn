<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlockController;

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::group([], function ($router) {
        Route::get('blocks/post/{postId}', [BlockController::class, 'getByPostId']);
        Route::post('blocks/post/{postId}', [BlockController::class, 'saveByPostId']);
    });
});

