<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthenticateMiddleware;

Route::group(['middleware' => AdminMiddleware::class], function () {

    // Album list for admin
    Route::get('/album_list', [AlbumController::class, 'album_list']);

    // Show all albums for admin
    Route::get('/album_list', [AlbumController::class, 'showAllAlbums']);

    // Show create album form
    Route::get('/albums/create', [AlbumController::class, 'create']);

    // Store album data
    Route::post('/albums', [AlbumController::class, 'store']);

    // Show edit album form
    Route::get('/albums/{album}/edit', [AlbumController::class, 'edit']);

    // Update album
    Route::put('/albums/{album}', [AlbumController::class, 'update']);

    // Delete album
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy']);

    // User list for admin
    Route::get('/user_list', [UserController::class, 'user_list']);

    // Show all users for admin
    Route::get('/user_list', [UserController::class, 'showAllUsers']);

    // Delete user
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    // Order list for admin
    Route::get('/order_list', [OrderController::class, 'order_list']);

    // Show all orders for admin
    Route::get('/order_list', [OrderController::class, 'showAllOrders']);

    // Delete order
    Route::delete('/orders/{order}', [OrderController::class, 'destroy_order']);

    // Comment list for admin
    Route::get('/comment_list', [CommentController::class, 'comment_list']);

    // Show all comments for admin
    Route::get('/comment_list', [CommentController::class, 'showAllComments']);

    // Show comments that belong to specific user
    Route::get('/comments/user/{userId}', [CommentController::class, 'getCommentsByUser']);

    // Show comments that belong to specific album
    Route::get('/comments/album/{albumId}', [CommentController::class, 'getCommentsByAlbum']);

    // Delete comment
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy_comment']);
});


Route::get('/browse', [AlbumController::class, 'browseAllAlbums'])->name('albums.browse');
Route::get('/albums/sort', [AlbumController::class, 'sort'])->name('albums.sort');
Route::get('/albums/filter', [AlbumController::class, 'filter'])->name('albums.filter');


// New albums
Route::get('/', [AlbumController::class, 'index']);

// Single album
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');

// Store a comment
Route::post('/albums/{album}', [AlbumController::class, 'storeComment']);

// Display comments
Route::get('/albums/{album}', [AlbumController::class, 'showComments']);

// Show register form
Route::get('/register', [UserController::class, 'create']);

// Users library of purchased items
Route::get('/library', [OrderController::class, 'showLibrary'])->name('library')->middleware(AuthenticateMiddleware::class);

// Show user comment history page
Route::get('/comment_history', [CommentController::class, 'commentHistory'])->middleware(AuthenticateMiddleware::class);

// Display authenticated user comments
Route::get('/comment_history', [CommentController::class, 'thisUserComments'])->middleware(AuthenticateMiddleware::class);

// Show user purchase history page
Route::get('/purchase_history', [AlbumController::class, 'orderHistory'])->middleware(AuthenticateMiddleware::class);

// Display authenticated user purchases
Route::get('/purchase_history', [AlbumController::class, 'thisUserOrders'])->middleware(AuthenticateMiddleware::class);

// Create user
Route::post('/users', [UserController::class, 'store']);

// Show login form
Route::get('/login', [UserController::class, 'login']);

// Authenticate user
Route::post('/users/authorize', [UserController::class, 'authorize']);

// User log out
Route::post('/logout', [UserController::class, 'logout']);

// Purchase an album
Route::post('/purchase', [AlbumController::class, 'purchase'])->name('purchase')->middleware(AuthenticateMiddleware::class);
