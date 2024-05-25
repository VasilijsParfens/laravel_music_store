@extends('layout')

@section('content')

<div class="bg-orange-100 py-2 mt-8">
    <h4 class="justify-center text-4xl text-center">Browse for albums</h4>
    <hr class="border-t-2 border-gray-700 mt-4 w-1/3 mx-auto">

    <!-- Filtering Form -->
    <form action="{{ route('albums.filter') }}" method="GET" class="text-center mb-4 mt-4">
        <input type="text" name="keyword" id="keyword" class="border border-gray-400 rounded-md px-4 py-3 w-1/4" placeholder="Search albums or artists">
        <button type="submit" class="text-white text-lg py-2 px-4 rounded bg-amber-600 hover:bg-amber-700 duration-75">Filter</button>
    </form>

    <!-- Sorting Form -->
    <form action="{{ route('albums.sort') }}" method="GET" class="text-center mb-4 mt-4">
        <label for="sortBy" class="mr-2 text-lg">Sort by:</label>
        <select name="sortBy" id="sortBy" class="bg-white border border-gray-400 rounded-md px-4 py-1 text-center">
            <option value="title" {{ $sortBy == 'title' ? 'selected' : '' }}>Title</option>
            <option value="artist" {{ $sortBy == 'artist' ? 'selected' : '' }}>Artist</option>
            <option value="release_year" {{ $sortBy == 'release_year' ? 'selected' : '' }}>Release Year</option>
            <option value="price" {{ $sortBy == 'price' ? 'selected' : '' }}>Price</option>
        </select>
        <select name="order" id="order" class="bg-white border border-gray-400 rounded-md px-4 py-1 text-center">
            <option value="asc" {{ $order == 'asc' ? 'selected' : '' }}>Ascending</option>
            <option value="desc" {{ $order == 'desc' ? 'selected' : '' }}>Descending</option>
        </select>
        <button type="submit" class="text-white text-lg py-1 px-5 rounded bg-amber-600 hover:bg-amber-700 duration-75 ">Sort</button>
    </form>

    <form action="{{ route('albums.sortByMood') }}" method="GET" class="text-center mb-4 mt-4">
        <label for="mood_id" class="mr-2 text-lg">Filter by Mood:</label>
        <select name="mood_id" id="mood_id" class="bg-white border border-gray-400 rounded-md px-4 py-1 text-center">
            @foreach($moods as $mood)
                <option value="{{ $mood->id }}">{{ $mood->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="text-white text-lg py-1 px-5 rounded bg-amber-600 hover:bg-amber-700 duration-75">Sort</button>
    </form>


</div>


<div class="grid gap-x-0.5 gap-y-4 grid-cols-4 mt-6">
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
                            <div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <p>No albums found</p>
    @endif




@endsection
