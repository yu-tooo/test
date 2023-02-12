<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::get('/', [ContentController::class, 'inquire']);
Route::post('/', [ContentController::class, 'reinquire']);
Route::post('/confirm', [ContentController::class, 'confirm']);
Route::post('/thanks', [ContentController::class, 'thanks']);

Route::get('/maker', [ContentController::class, 'search']);
Route::post('/maker', [ContentController::class, 'result']);

Route::post('/delete', [ContentController::class, 'delete']);