<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Album;
use App\Models\Order;
use App\Models\Comment;


use Illuminate\Http\Request;

class AlbumController extends Controller
{
    // Show new albums
    public function index(){

        // Fetch 9 newest albums by creation date
        $newestAlbums = Album::latest()->take(9)->get();

        return view('albums.index', compact('newestAlbums'));
    }

    // Show album list for admin
    public function album_list(){
        return view('albums.album_list');
    }

    // Show all albums
    public function showAllAlbums(){

        $albums = Album::all();

        return view('albums.album_list', compact('albums'));
    }

    // Show single album
    public function show(Album $album){
        return view('albums.show', [
            'album' => $album
        ]);
    }

    // Show create form
    public function create(){
        return view('albums.create');
    }

    // Store album data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'release_year' => 'required',
            'description' => '',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);

        if($request->hasFile('album_cover')) {
            $formFields['album_cover'] = $request->file('album_cover')->store('album_covers', 'public');
        }

        Album::create($formFields);

        return redirect('/');
    }

    // Show edit form
    public function edit(Album $album){
        return view('albums.edit', ['album' => $album]);
    }

    // Update album data
    public function update(Request $request, Album $album){

        $formFields = $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'release_year' => 'required',
            'description' => '',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);

        if($request->hasFile('album_cover')) {
            $formFields['album_cover'] = $request->file('album_cover')->store('album_covers', 'public');
        }

        $album->update($formFields);

        return redirect('/album_list');
    }

    // Delete album
    public function destroy(Album $album) {
        $album->delete();
        return redirect('/album_list')->with('message', 'Album deleted successfully');
    }

    // Purchase album
    public function purchase(Request $request){
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('users.login')->with('error', 'Please login to purchase this album.');
        }

        // Get authenticated user
        $user = Auth::user();

        // Create a new order
        $order = new Order();
        $order->user_id = $user->id;
        $order->album_id = $request->album_id;
        $order->purchase_price = $request->purchase_price;
        $order->save();

        return redirect('/');
    }

    public function orderHistory(){
        return view('users.purchase_history');
    }

    public function thisUserOrders(){
        $user = auth()->user();

        $orders = $user->orders()->with('album')->latest()->get();

        // Calculate total sum of orders' prices
        $totalAmount = $orders->sum(function ($order) {
            return $order->album->price;
        });

        return view('users.purchase_history', compact('orders', 'totalAmount'));
    }

    public function storeComment(Request $request){
        $request->validate([
            'text' => 'required|string',
            'album_id' => 'required|exists:albums,id',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->album_id = $request->album_id;
        $comment->text = $request->text;
        $comment->save();

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }

    public function showComments($album_id)
    {
        $album = Album::findOrFail($album_id);
        $comments = $album->comments()->with('user')->get();
        return view('albums.show', compact('album', 'comments'));
    }

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

}
