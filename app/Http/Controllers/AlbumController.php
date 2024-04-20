<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    // Show all albums
    public function index(){
        return view('albums.index',[
            'albums' => Album::latest()->filter(request(['search']))->paginate(3)
        ]);
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

        return redirect('/');
    }
}
