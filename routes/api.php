<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomTourController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlogController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::group(['middleware' => ['auth:sanctum']], function () {
    
});
Route::resource('tours', TourController::class);
Route::put('/tours/{id}/archive', [TourController::class, 'archive']);
Route::get('/blogs/{id}', [BlogController::class, 'edit']);
Route::resource('blogs', BlogController::class);
Route::put('/blogs/{id}/archive',[BlogController::class,'archive']);
Route::resource('contact', ContactController::class);
Route::resource('custom-tours', CustomTourController::class);


Route::post('login', [AuthenticationController::class, 'login']);
Route::post('register', [AuthenticationController::class, 'register']);
Route::post('logout', [AuthenticationController::class, 'logout']);
Route::post('custom-tours', [CustomTourController::class, 'store']);
Route::get('latest-contacts', [ContactController::class, 'latest']);
Route::get('latest-custom-tours', [CustomTourController::class, 'latest']);
Route::get('/countries', [CountryController::class, 'index']);



