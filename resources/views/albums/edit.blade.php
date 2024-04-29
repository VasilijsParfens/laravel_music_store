<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Albums</title>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
            extend: {
                colors: {
                laravel: '#ef3b2d',
                },
            },
            },
        }
    </script>
</head>
<body class="bg-orange-50 font-mono">
    <nav class="bg-amber-600 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
          <div>
            <p class="text-white text-xl font-bold">Admin Panel</p>
          </div>
          <div class="flex justify-center space-x-60">
            <a href="/album_list" class="text-white text-xl px-12 py-6 rounded-lg hover:bg-amber-700">Albums</a>
            <a href="/user_list" class="text-white text-xl px-12 py-6 rounded-lg hover:bg-amber-700">Users</a>
            <a href="/comment_list" class="text-white text-xl px-12 py-6 rounded-lg hover:bg-amber-700">Comments</a>
          </div>
        </div>
    </nav>
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
      <a href="/album_list"text-black ml-4"> Back </a>
    </div>
  </form>
</div>
