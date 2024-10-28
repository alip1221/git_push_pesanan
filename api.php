<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

Route::get('pesanan', [PesananController::class, 'index']);
Route::post('pesanan', [PesananController::class, 'store']);
Route::get('pesanan/{id}', [PesananController::class, 'show']);
Route::put('pesanan/{id}', [PesananController::class, 'update']);
Route::delete('pesanan/{id}', [PesananController::class, 'destroy']);
