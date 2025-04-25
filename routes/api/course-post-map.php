<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CoursePostMapController;

Route::group([], function ($router) {
    Route::get('course_post_maps', [CoursePostMapController::class, 'all']);
    Route::get('course_post_maps/{id}', [CoursePostMapController::class, 'getById']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('course_post_maps', [CoursePostMapController::class, 'create']);
    Route::post('course_post_maps/{id}', [CoursePostMapController::class, 'update']);
});