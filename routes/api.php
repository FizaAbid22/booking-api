<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ping',function(){
    return ['Message'=> 'Api is working'];
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

