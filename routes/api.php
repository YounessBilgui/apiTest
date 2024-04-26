<?php

use App\Http\Controllers\testController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');

Route::get('/profiles', [testController::class,'index']);

Route::post('/profile/create', [testController::class,'store']);