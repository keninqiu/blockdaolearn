<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MiniController;

Route::group([], function ($router) {
    Route::get('minis', [MiniController::class, 'all']);
    Route::get('minis/{slug}', [MiniController::class, 'getBySlug']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('minis', [MiniController::class, 'create']);
    Route::post('minis/{id}', [MiniController::class, 'update']);
});