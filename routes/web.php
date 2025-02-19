<?php

use App\Enums\PropertyStatus;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/PropertyStatusEnum', function () {
    return response()->json([
        'statuses' => PropertyStatus::values()
    ]);
});


