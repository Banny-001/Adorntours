<?php

use App\Http\Controllers\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::group(['middleware' => ['auth:sanctum']], function () {
    
});
Route::resource('tours', TourController::class);
Route::post('login', [AuthenticationController::class, 'login']);

