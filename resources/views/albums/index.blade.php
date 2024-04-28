@extends('layout')

@section('content')


<div class="flex items-center justify-center h-54vh mt-8 mb-8">
    <div class="relative">
        <img class="opacity-85" src="./img/mick-haupt-vGXHIh3URzc-unsplash.jpg" alt="music store image" loading="lazy">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex gap-x-20">
            <button class="bg-white w-64 h-12 rounded-md border border-black inline font-martian hover:bg-slate-200 ease-in-out duration-200" onclick="window.location.href='./product_categories/vinyl.html'">Your library</button>
            <button class="bg-white w-64 h-12 rounded-md border border-black inline font-martian hover:bg-slate-200 ease-in-out duration-200" onclick="window.location.href='./product_categories/cds.html'">Browse</button>
            <button class="bg-white w-64 h-12 rounded-md border border-black inline font-martian hover:bg-slate-200 ease-in-out duration-200" onclick="window.location.href='./product_categories/digital.html'">Purchase history</button>
        </div>
    </div>
</div>

<hr class="border-t-2 border-gray-700">
@include('partials._search')
<hr class="border-t-2 border-gray-700 mb-4">
<h4 class="justify-center text-4xl text-center">Newest arrivals</h4>
<hr class="border-t-2 border-gray-700 mt-4">
<div class="grid gap-x-0.5 gap-y-4 grid-cols-3 mt-6">
    @if(count($newestAlbums) > 0)
        @foreach($newestAlbums as $album)
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
                                <p class="text-xl">{{$album->title}}</p>
                            </div>
                            <div>
                                <p class="text-orange-500 text-xl">{{$album->price}}</p>
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


