@extends('layout')

@section('content')

<div class="relative flex items-center justify-center">
    <div class="flex flex-col items-l">
        <img class="w-64 h-64" src="{{$album->album_cover ? asset('storage/' . $album->album_cover) : asset('/images/noimage.png')}}">
        <div>
            <p class="my-1 text-5xl">
                {{$album['title']}}
            </p><br>
            <p class="my-1 text-xl">
                {{$album['artist']}}
            </p><br>
            <p class="my-1 text-xl">
                {{$album['release_year']}}
            </p><br>
            <p class="my-1 text-xl text-slate-500">
                {{$album['description']}}
            </p><br>
            <p class="my-1 text-xl text-orange-600">
                {{$album['price']}}
            </p>
        </div>
    </div>
    @auth
        <form action="{{ route('purchase') }}" method="post">
            @csrf
            <input type="hidden" name="album_id" value="{{ $album->id }}">
            <input type="hidden" name="purchase_price" value="{{ $album->price }}">
            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Purchase</button>
        </form>
    @endauth
</div>



@endsection
