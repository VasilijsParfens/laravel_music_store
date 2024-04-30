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
                    <p>Purchase_history</p>
                </div>
            </a>
        </div>
    </div>
</div>

<h4 class="justify-center text-4xl text-center">Comments you wrote</h4>
<hr class="border-t-2 border-gray-700 mt-4 w-1/3 mx-auto">

<div class="flex flex-col items-center">
    @foreach ($comments as $comment)
        <div class="ml-14 mt-4 w-1/2 bg-gray-200 rounded-xl p-4">
            <p class="text-base">{{ $comment->created_at->format('Y-m-d') }}:   Album "{{$comment->album->title}}" by {{$comment->album->artist}}</p>
            <hr class="border-t-2 border-gray-700 mt-2 mb-4">
            <p class="text-xl">{{ $comment->text }}</p>
        </div>
    @endforeach
</div>

@endsection
