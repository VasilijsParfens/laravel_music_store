<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Album;
use App\Http\Controllers\AlbumController;


// All albums
Route::get('/', [AlbumController::class, 'index']);

// Show create album form
Route::get('/albums/create', [AlbumController::class, 'create']);

// Store album data
Route::post('/albums', [AlbumController::class, 'store']);

// Show edit album form
Route::get('/albums/{album}/edit', [AlbumController::class, 'edit']);

// Update album
Route::put('/albums/{album}', [AlbumController::class, 'update']);

// Single album
Route::get('/albums/{album}', [AlbumController::class, 'show']);
