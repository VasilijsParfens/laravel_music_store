<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function getCommentsByUser($userId)
    {
        $comments = Comment::where('user_id', $userId)->get();
        return view('albums.comment_list', compact('comments'));
    }

    public function getCommentsByAlbum($albumId)
    {
        $comments = Comment::where('album_id', $albumId)->get();
        return view('albums.comment_list', compact('comments'));
    }

    public function commentHistory(){
        return view('users.comment_history');
    }

    public function thisUserComments(){
        $user = auth()->user();
        $comments = $user->comments()->latest()->get();
        return view('users.comment_history', compact('comments'));
    }
}
