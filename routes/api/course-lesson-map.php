<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourseLessonMapController;

Route::group([], function ($router) {
    Route::get('course_lesson_maps', [CourseLessonMapController::class, 'all']);
    Route::get('course_lesson_maps/{id}', [CourseLessonMapController::class, 'getById']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('course_lesson_maps', [CourseLessonMapController::class, 'create']);
    Route::post('course_lesson_maps/{id}', [CourseLessonMapController::class, 'update']);
});