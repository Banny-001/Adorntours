<?php

use App\Http\Controllers\ContactController;
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
Route::resource('blogs', BlogController::class);


Route::post('login', [AuthenticationController::class, 'login']);
Route::post('logout', [AuthenticationController::class, 'logout']);

Route::post('contacts/latest', [ContactController::class, 'latest']);
Route::post('custom-tours/latest', [CustomTourController::class, 'latest']);


