<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Album;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\AssignedRating;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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

// Route to handle assignment of rating
Route::post('/albums/{album}', [AlbumController::class, 'assignRating']);

Route::get('/albums/{album}', [AlbumController::class, 'showAlbum']);

// Store comments
Route::post('/albums/{album}', [AlbumController::class, 'storeComment']);

// Display comments
Route::get('/albums/{album}', [AlbumController::class, 'showComments']);

// Show register form
Route::get('/register', [UserController::class, 'create']);

// Users library of purchased items
Route::get('/library', [OrderController::class, 'showLibrary'])->name('library');

// Create user
Route::post('/users', [UserController::class, 'store']);

// Show login form
Route::get('/login', [UserController::class, 'login']);

// Authenticate user
Route::post('/users/authorize', [UserController::class, 'authorize']);

// User log out
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/purchase', [AlbumController::class, 'purchase'])->name('purchase');
