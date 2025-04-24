<?php
use Illuminate\Support\Facades\Route;

Route::group([], function ($router) {
    Route::get('degree_course_maps', [DegreeCourseMapController::class, 'all']);
    Route::get('degree_course_maps/{id}', [DegreeCourseMapController::class, 'getById']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('degree_course_maps', [DegreeCourseMapController::class, 'create']);
    Route::post('degree_course_maps/{id}', [DegreeCourseMapController::class, 'update']);
});