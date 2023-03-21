<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LetterController;
use App\Http\Controllers\API\AuthController;


Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);

Route::middleware(['auth:sanctum', 'ability:server:admin'])->group(function () {

    Route::get('/checkingAuthenticated', function () {
        return response()->json([
            'message'=>'estas dentro',
             'status'=>200,
            ], 200);
    });
    Route::controller(LetterController::class)->group(function () {
        Route::post('/letter', 'store');
        Route::get('/edit-letter/{id}', 'show');
        Route::put('/letter/{id}', 'update');
        Route::delete('/letter/{id}', 'destroy');
    });
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class,'logout']);
});

Route::controller(LetterController::class)->group(function () {
    Route::get('/letters', 'index');
    Route::get('/vowels', 'showvowels');
});
