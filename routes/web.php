<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkerController;

Route::get('/', [WorkerController::class, 'index']);
Route::post('/workers', [WorkerController::class, 'store']); // Tambah data
Route::put('/workers/{id}', [WorkerController::class, 'update']); // Edit data
Route::delete('/workers/{id}', [WorkerController::class, 'destroy']); // Hapus data

Route::get('/welcome', function () {
    return view('welcome');
});
