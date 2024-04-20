@extends('layout')

@section('content')
<div class="flex justify-center items-center h-full">
  <form method="POST" action="/albums" enctype="multipart/form-data" class="w-1/2">
    @csrf
    <div class="mb-6">
      <label for="title" class="inline-block text-lg mb-2 mt-8">Album title</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('title')}}" />
      @error('title')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="artist" class="inline-block text-lg mb-2">Artist</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="artist" placeholder="" value="{{old('artist')}}" />
      @error('artist')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="release_year" class="inline-block text-lg mb-2">Release year</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="release_year" placeholder="" value="{{old('release_year')}}" />
      @error('release_year')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">Album description</label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="">{{old('description')}}</textarea>
    </div>

    <div class="mb-6">
      <label for="price" class="inline-block text-lg mb-2">Price</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price" value="{{old('price')}}" />
      @error('price')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="album_cover" class="inline-block text-lg mb-2">Album cover</label>
      <input type="file" class="border border-gray-200 rounded p-2 w-full" name="album_cover" />
      @error('album_cover')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <button class="bg-red-600 text-white rounded py-2 px-4 hover:bg-black">
        Create album
      </button>
      <a href="/" class="text-black ml-4"> Back </a>
    </div>
  </form>
</div>
@endsection
