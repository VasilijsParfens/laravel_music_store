<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Show comment list for admin
    public function comment_list(){
        return view('albums.comment_list');
    }

    // Show all comments
    public function showAllComments(){
        $comments = Comment::all();
        return view('albums.comment_list', compact('comments'));
    }

    // Delete comment
    public function destroy_comment(Comment $comment) {
        $comment->delete();
        return redirect('/comment_list');
    }

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
