<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::apiResource('properties', PropertyController::class);

Route::patch('/properties/{property}', [PropertyController::class, 'update']);

Route::get('/property-statuses', [PropertyController::class, 'statuses']);
