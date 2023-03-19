<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LetterController;
use App\Http\Controllers\API\AuthController;


Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);

Route::middleware(['auth:sanctum','IsAPIAdmin'])->group(function () {

    Route::get('/checkingAuthenticated', function () {
        return response()->json([
            'message'=>'estas dentro',
             'status'=>200,
            ], 200);
    });

});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class,'logout']);
});

Route::get('/letters', [LetterController::class,'index'])->name('letters');
Route::get('/vowels', [LetterController::class,'showvowels'])->name('vowels');