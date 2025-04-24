<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryPostMapController;

Route::group([], function ($router) {
    Route::get('category_post_maps', [CategoryPostMapController::class, 'all']);
    Route::get('category_post_maps/{id}', [CategoryPostMapController::class, 'getById']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('category_post_maps', [CategoryPostMapController::class, 'create']);
    Route::post('category_post_maps/{id}', [CategoryPostMapController::class, 'update']);
});