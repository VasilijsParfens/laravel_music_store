@extends('layout')

@section('content')
<div class="grid grid-cols-2 gap-2">
    <div>
        <img class="w-80 h-80 mt-14 ml-52 rounded-xl" src="{{$album->album_cover ? asset('storage/' . $album->album_cover) : asset('/images/noimage.png')}}">
    </div>
    <div class="flex flex-col justify-center mt-14 mr-24">
        <div class="">
            <p class="my-1 text-5xl">
                {{$album['title']}}
            </p><br>
            <p class="my-1 text-xl">
                {{$album['artist']}} | {{$album['release_year']}}
            </p><br>
            <p class="my-1 text-xl text-slate-500">
                {{$album['description']}}
            </p><br>
            <p class="my-1 text-xl text-orange-600">
                {{$album['price']}}$
            </p>
        </div>
        <!-- Conditionally show or hide the purchase button -->
        @auth
            @if(!$album->hasBeenPurchased())
                <div class="mt-4">
                    <form action="{{ route('purchase') }}" method="post">
                        @csrf
                        <input type="hidden" name="album_id" value="{{ $album->id }}">
                        <input type="hidden" name="purchase_price" value="{{ $album->price }}">
                        <button type="submit" class="px-6 py-4 bg-red-500 text-xl text-white rounded">Purchase</button>
                    </form>
                </div>
            @endif
        @else
            <div class="mt-4">
                <p>Please <a href="{{ route('login') }}" class="text-blue-500">login</a> to purchase this album.</p>
            </div>
        @endauth
    </div>
</div>
<div class="flex justify-center mt-8">
    <form method="post" action="/albums/comment" class="flex items-center w-1/2">
        @csrf
        <input type="hidden" name="album_id" value="{{ $album->id }}">
        <textarea class="flex-grow border-t-2 mr-2 w-full" name="text" placeholder="Write your comment here"></textarea>
        <button type="submit" class="p-4 bg-slate-300 rounded-xl w-52">Post Comment</button>
    </form>
</div>
<hr class="border-t-2 border-gray-700 mt-4">
<div class="font-martian text-4xl text-center mt-4">
    <h1>Comments</h1>
</div>
<hr class="border-t-2 border-gray-700 mt-4">

<div class="flex flex-col items-center">
    @foreach ($comments as $comment)
        <div class="ml-14 mt-4 w-1/2 bg-gray-200 rounded-xl p-4">
            <p class="text-base">{{ $comment->created_at->format('Y-m-d') }}:   {{ $comment->user->name }}</p>
            <hr class="border-t-2 border-gray-700 mt-2 mb-4">
            <p class="text-xl">{{ $comment->text }}</p>
        </div>
    @endforeach
</div>

@endsection
