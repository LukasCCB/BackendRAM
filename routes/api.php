<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Rick and Morty API',
        'version' => 'v1',
    ]);
});


Route::prefix('v1')->group(function () {
    Route::get('characters', [CharacterController::class, 'index']);
    Route::get('characters/{id}', [CharacterController::class, 'show']);
});
