<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\DiscordController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Resources\UserResource;


Route::get('/user', function (Request $request) {
    return response()->json(['status' => 'Backend is working!']);
})->middleware('auth:sanctum');
Route::get('/statusTEST', function () {
    return response()->json(['status' => 'Backend is working!']);
});

Route::prefix('auth')->group(function () {
    Route::get('/discord', [DiscordController::class, 'redirectToDiscord']);
    Route::get('/discord/callback', [DiscordController::class, 'handleDiscordCallback']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/teams', [TeamController::class, 'store']);
    Route::post('/teams/{team}/invitations', [TeamController::class, 'invite']);
});

Route::middleware('web')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login'])->middleware('throttle:5,1');
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    });

    Route::get('user', fn (Request $request) => UserResource::make($request->user()))
        ->middleware('auth:sanctum');
});