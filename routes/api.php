<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\DiscordController;
use App\Http\Controllers\Api\TeamController;


Route::get('/user', function (Request $request) {
    return response()->json(['status' => 'Backend is working!']);
})->middleware('auth:sanctum');
Route::get('/status', function () {
    return response()->json(['status' => 'Backend is working!']);
});

Route::prefix('auth')->group(function () {
    Route::get('/discord', [DiscordController::class, 'redirectToDiscord']);
    Route::get('/discord/callback', [DiscordController::class, 'handleDiscordCallback']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/teams', [TeamController::class, 'store']);
});