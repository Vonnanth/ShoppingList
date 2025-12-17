<?php

use App\Http\Controllers\ShoopingController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [ShoopingController::class, 'index']);
Route::post('/shopping', [ShoopingController::class, 'store']);
Route::put('/shopping', [ShoopingController::class, 'update']);
Route::delete('/shopping', [ShoopingController::class, 'delete']);
Route::patch('/shopping', [ShoopingController::class, 'edit']);