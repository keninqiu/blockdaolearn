<?php
use Illuminate\Support\Facades\Route;

Route::group([], function ($router) {
    Route::get('lessons', [LessonController::class, 'all']);
    Route::get('lessons/{slug}', [LessonController::class, 'getBySlug']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('lessons', [LessonController::class, 'create']);
    Route::post('lessons/{id}', [LessonController::class, 'update']);
});