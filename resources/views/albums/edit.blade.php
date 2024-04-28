@extends('layout')

@section('content')
<header class="text-center mt-5">
    <h2 class="text-2xl font-bold uppercase mb-1">Edit album</h2>
    <p class="mb-4 text-lg">{{$album->title}}</p>
</header>
<div class="flex justify-center items-center h-full">

  <form method="POST" action="/albums/{{$album->id}}" enctype="multipart/form-data" class="w-1/2">
    @csrf
    @method('PUT')
    <div class="mb-6">
      <label for="title" class="inline-block text-lg mb-2 mt-8">Album title</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$album->title}}" />
      @error('title')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="artist" class="inline-block text-lg mb-2">Artist</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="artist" placeholder="" value="{{$album->artist}}" />
      @error('artist')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="release_year" class="inline-block text-lg mb-2">Release year</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="release_year" placeholder="" value="{{$album->release_year}}" />
      @error('release_year')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">Album description</label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="">{{$album->description}}</textarea>
    </div>

    <div class="mb-6">
      <label for="price" class="inline-block text-lg mb-2">Price</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price" value="{{$album->price}}" />
      @error('price')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="album_cover" class="inline-block text-lg mb-2">Album cover</label>
      <input type="file" class="border border-gray-200 rounded p-2 w-full" name="album_cover" />

      <img class="w-64 h-64" src="{{$album->album_cover ? asset('storage/' . $album->album_cover) : asset('/images/noimage.png')}}">

      @error('album_cover')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <button class="bg-red-600 text-white rounded py-2 px-4 hover:bg-black">
        Update album
      </button>
      <a href="/" class="text-black ml-4"> Back </a>
    </div>
  </form>
</div>
@endsection
