<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryCourseMapController;

Route::group([], function ($router) {
    Route::get('category_course_maps', [CategoryCourseMapController::class, 'all']);
    Route::get('category_course_maps/{id}', [CategoryCourseMapController::class, 'getById']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('category_course_maps', [CategoryCourseMapController::class, 'create']);
    Route::post('category_course_maps/{id}', [CategoryCourseMapController::class, 'update']);
});