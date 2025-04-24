<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MiniPostMapController;

Route::group([], function ($router) {
    Route::get('mini_post_maps', [MiniPostMapController::class, 'all']);
    Route::get('mini_post_maps/{id}', [MiniPostMapController::class, 'getById']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('mini_post_maps', [MiniPostMapController::class, 'create']);
    Route::post('mini_post_maps/{id}', [MiniPostMapController::class, 'update']);
});