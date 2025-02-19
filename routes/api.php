<?php

use App\Http\Controllers\PropertyController;
use App\Http\Requests\PatchPropertyRequest;
use Illuminate\Support\Facades\Route;


Route::apiResource('properties', PropertyController::class);

Route::patch('/properties/{property}', [PropertyController::class, 'update']);

