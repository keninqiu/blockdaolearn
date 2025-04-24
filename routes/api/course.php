<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CourseController;

Route::group([], function ($router) {
    Route::get('courses', [CourseController::class, 'all']);
    Route::get('courses/{slug}', [CourseController::class, 'getBySlug']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('courses', [CourseController::class, 'create']);
    Route::post('courses/{id}', [CourseController::class, 'update']);
});