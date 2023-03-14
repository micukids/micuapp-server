<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LetterController;
use App\Http\Controllers\API\AuthController;


Route::post('register', [AuthController::class,'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/letters', [LetterController::class,'index'])->name('letters');
Route::get('/vowels', [LetterController::class,'showvowels'])->name('vowels');