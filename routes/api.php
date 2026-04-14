<?php

use App\Http\Controllers\AsesiController;
use App\Http\Controllers\AsesorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;           

Route::middleware('api')->group(function () {
    // Asesi Routes
    Route::prefix('asesi')->group(function () {
        Route::get('/', [AsesiController::class, 'index']);
        Route::post('/', [AsesiController::class, 'store']);
        Route::get('/{id}', [AsesiController::class, 'show']);
        Route::put('/{id}', [AsesiController::class, 'update']);
        Route::delete('/{id}', [AsesiController::class, 'destroy']);
        Route::post('/import', [AsesiController::class, 'import']);
        Route::get('/export', [AsesiController::class, 'export']);
    });

    // Asesor Routes
    Route::prefix('asesor')->group(function () {
        Route::get('/', [AsesorController::class, 'index']);
        Route::post('/', [AsesorController::class, 'store']);
        Route::get('/{id}', [AsesorController::class, 'show']);
        Route::put('/{id}', [AsesorController::class, 'update']);
        Route::delete('/{id}', [AsesorController::class, 'destroy']);
        Route::post('/import', [AsesorController::class, 'import']);
        Route::get('/export', [AsesorController::class, 'export']);
    });
});
