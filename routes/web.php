<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Album;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;

Route::group(['middleware' => AdminMiddleware::class], function () {
    // Show create album form
    Route::get('/albums/create', [AlbumController::class, 'create']);

    // Store album data
    Route::post('/albums', [AlbumController::class, 'store']);

    // Show edit album form
    Route::get('/albums/{album}/edit', [AlbumController::class, 'edit']);

    // Update album
    Route::put('/albums/{album}', [AlbumController::class, 'update']);
});

// All albums
Route::get('/', [AlbumController::class, 'index']);

// Single album
Route::get('/albums/{album}', [AlbumController::class, 'show']);

// Show register form
Route::get('/register', [UserController::class, 'create']);

// Create user
Route::post('/users', [UserController::class, 'store']);

// Show login form
Route::get('/login', [UserController::class, 'login']);

// Authenticate user
Route::post('/users/authorize', [UserController::class, 'authorize']);

// User log out
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/purchase', [AlbumController::class, 'purchase'])->name('purchase');
