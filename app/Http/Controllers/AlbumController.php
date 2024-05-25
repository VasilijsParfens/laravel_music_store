<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Mood;

class AlbumController extends Controller
{
    public function index()
    {
        $newestAlbums = Album::latest()->take(4)->get();
        $bestSellingAlbums = Album::withCount('orders')->orderByDesc('orders_count')->take(4)->get();

        return view('albums.index', compact('newestAlbums', 'bestSellingAlbums'));
    }

    public function album_list()
    {
        return view('albums.album_list');
    }

    public function showAllAlbums()
    {
        $albums = Album::all();
        return view('albums.album_list', compact('albums'));
    }

    public function browseAllAlbums()
    {
        $albums = Album::latest()->get(); // Default display
        $sortBy = 'title'; // Default sorting by title
        $order = 'asc'; // Default order ascending
        $moods = Mood::all(); // Fetch all moods

        return view('albums.browse', compact('albums', 'sortBy', 'order', 'moods'));
    }



    public function sort(Request $request)
    {
        $sortBy = $request->input('sortBy');
        $order = $request->input('order');

        // Fetch all moods
        $moods = Mood::all();

        $albums = Album::orderBy($sortBy, $order)->get();

        return view('albums.browse', compact('albums', 'sortBy', 'order', 'moods'));
    }

    public function filter(Request $request)
    {
        $keyword = $request->input('keyword');

        // Retrieve sorting options if they are present in the request
        $sortBy = $request->input('sortBy', 'title');
        $order = $request->input('order', 'asc');

        // Fetch all moods
        $moods = Mood::all();

        $albums = Album::where('title', 'like', "%$keyword%")
            ->orWhere('artist', 'like', "%$keyword%")
            ->orWhere('release_year', 'like', "%$keyword%")
            ->orWhere('price', 'like', "%$keyword%")
            ->orderBy($sortBy, $order)
            ->get();

        // Pass $moods, $albums, $sortBy, and $order to the view
        return view('albums.browse', compact('moods', 'albums', 'sortBy', 'order'));
    }


    public function sortByMood(Request $request)
{
    $moods = Mood::all(); // Fetch all moods
    $moodId = $request->input('mood_id');
    $sortBy = $request->input('sortBy');
    $order = $request->input('order');

    // Validate the order direction
    if (!in_array($order, ['asc', 'desc'])) {
        // If the order direction is invalid, default to 'asc'
        $order = 'asc';
    }

    // Validate the sortBy parameter
    $validSortColumns = ['title', 'artist', 'release_year', 'price']; // List of valid sort columns
    if (!in_array($sortBy, $validSortColumns)) {
        // If sortBy is not valid, default to 'title'
        $sortBy = 'title';
    }

    // Fetch albums based on mood and sorting criteria
    $albums = Album::whereHas('moods', function ($query) use ($moodId) {
        $query->where('moods.id', $moodId);
    })
    ->orderBy($sortBy, $order)
    ->get();

// Pass $moods, $albums, $sortBy, and $order to the view
return view('albums.browse', compact('moods', 'albums', 'sortBy', 'order'));
}





    public function show(Album $album)
    {
        $comments = $album->comments()->with('user')->get();
        $moods = Mood::all();
        return view('albums.show', compact('album', 'comments', 'moods'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'release_year' => 'required',
            'description' => '',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);
        if ($request->hasFile('album_cover')) {
            $formFields['album_cover'] = $request->file('album_cover')->store('album_covers', 'public');
        }
        Album::create($formFields);
        return redirect('/');
    }

    public function edit(Album $album)
    {
        return view('albums.edit', ['album' => $album]);
    }

    public function update(Request $request, Album $album)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'release_year' => 'required',
            'description' => '',
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);
        if ($request->hasFile('album_cover')) {
            $formFields['album_cover'] = $request->file('album_cover')->store('album_covers', 'public');
        }
        $album->update($formFields);
        return redirect('/album_list');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect('/album_list')->with('message', 'Album deleted successfully');
    }

    public function purchase(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('users.login')->with('error', 'Please login to purchase this album.');
        }
        $user = Auth::user();
        $order = new Order();
        $order->user_id = $user->id;
        $order->album_id = $request->album_id;
        $order->purchase_price = $request->purchase_price;
        $order->save();
        return redirect('/');
    }

    public function orderHistory()
    {
        return view('users.purchase_history');
    }

    public function thisUserOrders()
    {
        $user = auth()->user();
        $orders = $user->orders()->with('album')->latest()->get();
        $totalAmount = $orders->sum(function ($order) {
            return $order->album->price;
        });
        return view('users.purchase_history', compact('orders', 'totalAmount'));
    }

    public function storeComment(Request $request)
    {
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

    public function rate(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albums,id',
            'mood_id' => 'required|exists:moods,id',
        ]);
        $album = Album::findOrFail($request->album_id);
        $mood = Mood::findOrFail($request->mood_id);
        $album->moods()->syncWithoutDetaching($mood->id);
        return redirect()->back()->with('success', 'Album rated successfully by mood!');
    }
}
