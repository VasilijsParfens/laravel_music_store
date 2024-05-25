@extends('layout')

@section('content')


<div class="flex items-center justify-center h-54vh mt-8 mb-8">
    <div class="relative">
        <img class="opacity-75" src="images/mick-haupt-vGXHIh3URzc-unsplash.jpg" alt="music store image" loading="lazy">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex gap-x-20">
            <a href="/library">
                <div class="bg-white w-64 h-12 rounded-md border border-black font-martian flex justify-center items-center hover:bg-slate-200 ease-in-out duration-100">
                    <p>Your library</p>
                </div>
            </a>
            <a href="/browse">
                <div class="bg-white w-64 h-12 rounded-md border border-black font-martian flex justify-center items-center hover:bg-slate-200 ease-in-out duration-100">
                    <p>Browse</p>
                </div>
            </a>
            <a href="/comment_history">
                <div class="bg-white w-64 h-12 rounded-md border border-black font-martian flex justify-center items-center hover:bg-slate-200 ease-in-out duration-100">
                    <p>History</p>
                </div>
            </a>
        </div>
    </div>
</div>

<h4 class="justify-center text-4xl text-center">Newest arrivals</h4>
<hr class="border-t-2 border-gray-700 mt-4 w-1/3 mx-auto">
<div class="grid gap-x-0.5 gap-y-4 grid-cols-4 mt-6">
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
    <h4 class="justify-center text-4xl text-center">Bestsellers</h4>
    <hr class="border-t-2 border-gray-700 mt-4 w-1/3 mx-auto">
    <div class="grid gap-x-0.5 gap-y-4 grid-cols-4 mt-6">
        @foreach($bestSellingAlbums as $album)
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


