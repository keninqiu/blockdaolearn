<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;

Route::group([], function ($router) {
    Route::get('categories', [CategoryController::class, 'all']);
    Route::get('categories/{slug}', [CategoryController::class, 'getBySlug']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('categories', [CategoryController::class, 'create']);
    Route::post('categories/{id}', [CategoryController::class, 'update']);
});