<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LetterController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SuggestionController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\DownloadController;


Route::post('register', [AuthController::class,'register'])->name('signUp');
Route::post('login', [AuthController::class,'login'])->name('logIn');
Route::post('contact', [ContactController::class,'store'])->name('contactStore');

Route::middleware(['auth:sanctum', 'ability:server:admin'])->group(function () {
    Route::get('/checkingAuthenticated', function () {
        return response()->json([
            'message'=>'estas dentro',
             'status'=>200,
            ], 200);
    });
    
    Route::controller(LetterController::class)->group(function () {
        Route::post('/letter', 'store')->name('letterStore');
        Route::get('/letter/{id}', 'show')->name('letterShow');
        Route::put('/letter/{id}', 'update')->name('letterUpdate');
        Route::delete('/letter/{id}', 'destroy')->name('letterDestroy');
    });

    Route::controller(SuggestionController::class)->group(function () {
        Route::post('/suggestion', 'store')->name('suggestionStore');
        Route::get('/suggestion/{id}', 'show')->name('suggestionShow');
        Route::put('/suggestion/{id}', 'update')->name('suggestionUpdate');
        Route::delete('/suggestion/{id}', 'destroy')->name('suggestionDestroy');
    });
    
    Route::controller(ContactController::class)->group(function () {
        Route::get('contacts','index')->name('contacts');
        Route::delete('/contact/{id}', 'destroy')->name('contactDestroy');
    });

    Route::controller(DownloadController::class)->group(function () {
        Route::post('/download', 'store')->name('downloadStore');
        Route::get('/download/{id}', 'show')->name('downloadShow');
        Route::put('/download/{id}', 'update')->name('downloadUpdate');
        Route::delete('/download/{id}', 'destroy')->name('downloadDestroy');
    });
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class,'logout']);
});

Route::controller(LetterController::class)->group(function () {
    Route::get('/letters', 'index')->name('letters');
    Route::get('/vowels', 'showvowels');
});

Route::get('suggestions', [SuggestionController::class, 'index'])->name('suggestions');

Route::controller(DownloadController::class)->group(function () {
    Route::get('/downloads', 'index')->name('downloads');
});
