@extends('layout')

@section('content')

<div class="flex items-center justify-center h-54vh mt-8 mb-8">
    <div class="relative">
        <img class="opacity-85" src="images/mick-haupt-vGXHIh3URzc-unsplash.jpg" alt="music store image" loading="lazy">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex gap-x-20">
            <a href="/comment_history">
                <div class="bg-white w-64 h-12 rounded-md border border-black font-martian flex justify-center items-center hover:bg-slate-200 ease-in-out duration-100">
                    <p>Your comments</p>
                </div>
            </a>
            <a href="/purchase_history">
                <div class="bg-white w-64 h-12 rounded-md border border-black font-martian flex justify-center items-center hover:bg-slate-200 ease-in-out duration-100">
                    <p>Purchase history</p>
                </div>
            </a>
        </div>
    </div>
</div>

<h4 class="justify-center text-4xl text-center mx-auto">Comments you wrote</h4>
<hr class="border-t-2 border-gray-700 mt-4 w-1/3 mx-auto">

<div class="flex justify-center">
    <div class="flex flex-col items-center">
        @if(count($comments) > 0)
            @foreach ($comments as $comment)
            <a href="/albums/{{$comment->album->id}}">
                <div class="w-full mt-4 bg-gray-200 rounded-xl border-2 border-gray-700 p-4 hover:bg-gray-300 duration-75 relative inline-block text-left">
                    <div class="flex items-center">
                        <img class="w-24 h-24 rounded-xl" src="{{$comment->album->album_cover ? asset('storage/' . $comment->album->album_cover) : asset('/images/noimage.jpg')}}" alt="">
                        <p class="text-xl ml-6">  Album "{{$comment->album->title}}" by {{$comment->album->artist}}</p>
                    </div>
                    <hr class="border-t-2 border-gray-700 mt-2 mb-4">
                    <p class="text-xl ml-6 mb-2">{{ $comment->text }}</p>
                    <div class="absolute top-3 right-4">
                        <p class="text-xl text-orange-600">{{ $comment->created_at->format('Y-m-d') }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        @else
            <p class="text-center text-xl mt-8">No comments found</p>
        @endif
    </div>
</div>







@endsection
