@extends('layout')

@section('content')
<div class="grid grid-cols-2 gap-8 px-8 py-16">
    <div class="flex justify-center">
        <img class="w-80 h-80 rounded-xl shadow-md" src="{{$album->album_cover ? asset('storage/' . $album->album_cover) : asset('/images/noimage.png')}}">
    </div>
    <div class="flex flex-col justify-center">
        <div>
            <p class="text-5xl font-bold mb-4">
                {{$album['title']}}
            </p>
            <p class="text-xl mb-2">
                {{$album['artist']}} | {{$album['release_year']}}
            </p>
            <p class="text-xl text-slate-500 mb-4">
                {{$album['description']}}
            </p>
            @if(!$album->hasBeenPurchased())
                <p class="text-xl text-orange-600 mb-4">
                    {{$album['price']}}$
                </p>
            @endif
        </div>
        <!-- Conditionally show or hide the purchase button -->
        @auth
            @if(!$album->hasBeenPurchased())
                <div class="mt-4">
                    <form action="{{ route('purchase') }}" method="post">
                        @csrf
                        <input type="hidden" name="album_id" value="{{ $album->id }}">
                        <input type="hidden" name="purchase_price" value="{{ $album->price }}">
                        <button type="submit" class="px-6 py-4 bg-red-500 text-xl text-white rounded-lg shadow-md hover:bg-red-600 transition duration-200">Purchase</button>
                    </form>
                </div>
            @endif
        @else
            <div class="mt-4">
                <p class="text-lg">Please <a href="/login" class="text-blue-500 hover:underline">login</a> to purchase this album.</p>
            </div>
        @endauth
    </div>
</div>

@auth
<div class="flex justify-center mt-6">
    <form method="post" action="/albums/rate" class="flex items-center w-auto bg-gray-100 p-6 rounded-lg shadow-md">
        @csrf
        <input type="hidden" name="album_id" value="{{ $album->id }}">
        <label for="mood_id" class="mr-2 text-lg font-semibold">Rate this album:</label>
        <select name="mood_id" id="mood_id" class="border-2 border-gray-300 rounded-lg p-2 w-48 mr-4">
            @foreach ($moods as $mood)
                <option value="{{ $mood->id }}">{{ $mood->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="px-6 py-2 bg-amber-600 text-white rounded-lg shadow hover:bg-amber-700 transition duration-200">Rate</button>
    </form>
</div>
@endauth

<hr class="border-t-2 border-gray-300 mt-8">

<div class="text-center mt-8">
    <h1 class="text-4xl font-bold">Comments</h1>
</div>

<hr class="border-t-2 border-gray-300 mt-4">

<div class="flex flex-col items-center mt-8">
    @foreach ($comments as $comment)
        <div class="w-2/3 bg-gray-100 rounded-xl p-6 shadow-md mb-4">
            <p class="text-sm text-gray-500">{{ $comment->created_at->format('Y-m-d') }} - {{ $comment->user->name }}</p>
            <hr class="border-t-2 border-gray-300 mt-2 mb-4">
            <p class="text-lg">{{ $comment->text }}</p>
        </div>
    @endforeach
</div>

@endsection
