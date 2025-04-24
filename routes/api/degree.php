<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DegreeController;

Route::group([], function ($router) {
    Route::get('degrees', [DegreeController::class, 'all']);
    Route::get('degrees/{slug}', [DegreeController::class, 'getBySlug']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('degrees', [DegreeController::class, 'create']);
    Route::post('degrees/{id}', [DegreeController::class, 'update']);
});