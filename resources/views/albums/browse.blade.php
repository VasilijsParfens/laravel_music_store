@extends('layout')

@section('content')


<h4 class="justify-center text-4xl text-center">Browse for albums</h4>
<hr class="border-t-2 border-gray-700 mt-4 w-1/3 mx-auto">

<!-- Sorting Form -->
<form action="{{ route('albums.sort') }}" method="GET" class="text-center mb-4">
    <label for="sortBy" class="mr-2">Sort by:</label>
    <select name="sortBy" id="sortBy" class="border border-gray-400 rounded-md px-2 py-1">
        <option value="title">Title</option>
        <option value="artist">Artist</option>
        <option value="release_year">Release Year</option>
        <option value="price">Price</option>
    </select>
    <select name="order" id="order" class="border border-gray-400 rounded-md px-2 py-1">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
    </select>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">Sort</button>
</form>

<!-- Filtering Form -->
<form action="{{ route('albums.filter') }}" method="GET" class="text-center mb-4">
    <label for="keyword" class="mr-2">Filter:</label>
    <input type="text" name="keyword" id="keyword" class="border border-gray-400 rounded-md px-2 py-1" placeholder="Search...">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">Filter</button>
</form>

<div class="grid gap-x-0.5 gap-y-4 grid-cols-3 mt-6">
    @if(count($albums) > 0)
        @foreach($albums as $album)
        <div class="flex justify-center">
            <div class="flex justify-center">
                <a href="/albums/{{$album->id}}">
                    <div class="bg-slate-100 rounded-lg p-3 border-2 border-slate-500 mb-6 hover:bg-slate-200 duration-75">
                        <img class="w-52 h-52 rounded-lg" src="{{$album->album_cover ? asset('storage/' . $album->album_cover) : asset('/images/noimage.jpg')}}" alt="" />
                        <div class="font-martian">
                            <div>
                                <p class="text-gray-400 text-xl">{{$album->artist}}</p>
                            </div>
                            <div>
                                <p class="text-xl w-52">{{$album->title}}</p>
                            </div>
                            <div>
                                <p class="text-orange-500 text-xl">{{$album->price}}$</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <p class="text-center">No albums found</p>
    @endif
@endsection
