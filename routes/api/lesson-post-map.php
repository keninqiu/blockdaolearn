<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LessonPostMapController;

Route::group([], function ($router) {
    Route::get('lesson_post_maps', [LessonPostMapController::class, 'all']);
    Route::get('lesson_post_maps/{id}', [LessonPostMapController::class, 'getById']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('lesson_post_maps', [LessonPostMapController::class, 'create']);
    Route::post('lesson_post_maps/{id}', [LessonPostMapController::class, 'update']);
});

