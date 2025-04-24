<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LanguageController;

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