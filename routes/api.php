<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CategoryPostMapController;
use App\Http\Controllers\Api\BlockController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\MiniController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\DegreeController;
Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('refresh', [UserController::class, 'refresh']);
    Route::post('me', [UserController::class, 'me']);
    
    Route::get('users', [UserController::class, 'all'])->middleware(['role:admin']);
    Route::get('users/{id}', [UserController::class, 'getById'])->middleware(['role:admin']);
    Route::post('users/{id}', [UserController::class, 'update'])->middleware(['role:admin']);
});

Route::group([], function ($router) {
    Route::post('login', [UserController::class, 'login']);
});

Route::group([], function ($router) {
    Route::get('languages', [LanguageController::class, 'all']);
});
Route::group([], function ($router) {
    Route::get('languages/{code}', [LanguageController::class, 'getByCode']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('languages', [LanguageController::class, 'create'])->middleware(['role:admin']);
    Route::post('languages/{id}', [LanguageController::class, 'update'])->middleware(['role:admin']);
});

Route::group([], function ($router) {
    Route::get('categories', [CategoryController::class, 'all']);
    Route::get('categories/{slug}', [CategoryController::class, 'getBySlug']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::group([], function ($router) {
        Route::get('blocks/post/{postId}', [BlockController::class, 'getByPostId']);
        Route::post('blocks/post/{postId}', [BlockController::class, 'saveByPostId']);
    });
});



Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('categories', [CategoryController::class, 'create']);
    Route::post('categories/{id}', [CategoryController::class, 'update']);
});

Route::group([], function ($router) {
    Route::get('posts', [PostController::class, 'all']);
});

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

Route::group([], function ($router) {
    Route::get('posts/{slug}', [PostController::class, 'getBySlug']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('posts', [PostController::class, 'create']);
    Route::post('posts/{id}', [PostController::class, 'update']);
});


Route::group([], function ($router) {
    Route::get('category_post_maps', [CategoryPostMapController::class, 'all']);
});

Route::group([], function ($router) {
    Route::get('category_post_maps/{id}', [CategoryPostMapController::class, 'getById']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::post('category_post_maps', [CategoryPostMapController::class, 'create']);
    Route::post('category_post_maps/{id}', [CategoryPostMapController::class, 'update']);
});