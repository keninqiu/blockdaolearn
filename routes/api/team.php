<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TeamController;

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::get('teams', [TeamController::class, 'all']);
    Route::post('teams', [TeamController::class, 'create']);
    Route::get('teams/{id}', [TeamController::class, 'getById']);
    Route::post('teams/{id}', [TeamController::class, 'update']);
});