<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthenticateMiddleware;

Route::group(['middleware' => AdminMiddleware::class], function () {
    // Album routes for admin
    Route::get('/album_list', [AlbumController::class, 'album_list']);
    Route::get('/album_list', [AlbumController::class, 'showAllAlbums']);
    Route::get('/albums/create', [AlbumController::class, 'create']);
    Route::post('/albums', [AlbumController::class, 'store']);
    Route::get('/albums/{album}/edit', [AlbumController::class, 'edit']);
    Route::put('/albums/{album}', [AlbumController::class, 'update']);
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy']);

    // User routes for admin
    Route::get('/user_list', [UserController::class, 'user_list']);
    Route::get('/user_list', [UserController::class, 'showAllUsers']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    // Order routes for admin
    Route::get('/order_list', [OrderController::class, 'order_list']);
    Route::get('/order_list', [OrderController::class, 'showAllOrders']);
    Route::delete('/orders/{order}', [OrderController::class, 'destroy_order']);

    // Comment routes for admin
    Route::get('/comment_list', [CommentController::class, 'comment_list']);
    Route::get('/comment_list', [CommentController::class, 'showAllComments']);
    Route::get('/comments/user/{userId}', [CommentController::class, 'getCommentsByUser']);
    Route::get('/comments/album/{albumId}', [CommentController::class, 'getCommentsByAlbum']);
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy_comment']);
});

// Browse all albums
Route::get('/browse', [AlbumController::class, 'browseAllAlbums'])->name('albums.browse');

// Sorting by other parameters
Route::get('/albums/sort', [AlbumController::class, 'sort'])->name('albums.sort');
Route::get('/albums/filter', [AlbumController::class, 'filter'])->name('albums.filter');
Route::get('/albums/sortByMood', [AlbumController::class, 'sortByMood'])->name('albums.sortByMood');

// Display albums in browse section
Route::get('/', [AlbumController::class, 'index']);

// Single album
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');

// Rate album by mood
Route::post('/albums/rate', [AlbumController::class, 'rate'])->name('albums.rate');

// Store a comment
Route::post('/albums/{album}/comment', [AlbumController::class, 'storeComment'])->name('albums.comment.store');

// Display comments
Route::get('/albums/{album}/comments', [AlbumController::class, 'showComments'])->name('albums.comments');

// User registration
Route::get('/register', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);

// User login/logout
Route::get('/login', [UserController::class, 'login']);
Route::post('/users/authorize', [UserController::class, 'authorize']);
Route::post('/logout', [UserController::class, 'logout']);

// User library and history
Route::get('/library', [OrderController::class, 'showLibrary'])->name('library')->middleware(AuthenticateMiddleware::class);
Route::get('/comment_history', [CommentController::class, 'commentHistory'])->middleware(AuthenticateMiddleware::class);
Route::get('/purchase_history', [AlbumController::class, 'orderHistory'])->middleware(AuthenticateMiddleware::class);
Route::get('/purchase_history', [AlbumController::class, 'thisUserOrders'])->middleware(AuthenticateMiddleware::class);

// Purchase an album
Route::post('/purchase', [AlbumController::class, 'purchase'])->name('purchase')->middleware(AuthenticateMiddleware::class);
