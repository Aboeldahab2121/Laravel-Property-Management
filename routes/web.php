<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('\test\{id}', [PropertyController::class, 'get']);
Route::post('\test', [PropertyController::class, 'store']);
Route::put('\test\{id}', [PropertyController::class, 'update']);
Route::delete('\test{id}', [PropertyController::class, 'destroy']);

