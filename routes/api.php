<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LetterController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SuggestionController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\DownloadController;


Route::post('register', [AuthController::class,'register'])->name('signUp');
Route::post('login', [AuthController::class,'login']);
Route::post('contact', [ContactController::class,'store']);

Route::middleware(['auth:sanctum', 'ability:server:admin'])->group(function () {
    Route::get('/checkingAuthenticated', function () {
        return response()->json([
            'message'=>'estas dentro',
             'status'=>200,
            ], 200);
    });
    
    Route::controller(LetterController::class)->group(function () {
        Route::post('/letter', 'store');
        Route::get('/letter/{id}', 'show');
        Route::put('/letter/{id}', 'update');
        Route::delete('/letter/{id}', 'destroy');
    });

    Route::controller(SuggestionController::class)->group(function () {
        Route::post('/suggestion', 'store');
        Route::get('/suggestion/{id}', 'show');
        Route::put('/suggestion/{id}', 'update');
        Route::delete('/suggestion/{id}', 'destroy');
    });
    
    Route::controller(ContactController::class)->group(function () {
        Route::get('contacts','index');
        Route::delete('/contact/{id}', 'destroy');
    });
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class,'logout']);
});

Route::controller(LetterController::class)->group(function () {
    Route::get('/letters', 'index');
    Route::get('/vowels', 'showvowels');
});

Route::get('suggestions', [SuggestionController::class, 'index']);

Route::controller(DownloadController::class)->group(function () {
    Route::get('/downloads', 'index');
    Route::post('/download', 'store');
    Route::get('/download/{id}', 'show');
    Route::put('/download/{id}', 'update');
    Route::delete('/download/{id}', 'delete');
});
