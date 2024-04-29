@extends('layout')

@section('content')

<div class="container mx-auto">
    <h4 class="justify-center text-4xl text-center mt-8">Your library</h4>
    <hr class="border-t-2 border-gray-700 mt-4 w-1/4 mx-auto">
    <div class="grid grid-cols-3 gap-4 mt-8">
        @foreach($userOrders as $order)
        <div class="flex justify-center">
            <div class="flex justify-center">
                <a href="/albums/{{$order->album->id}}">
                    <div class="bg-slate-100 rounded-lg p-3 border-2 border-slate-500 mb-6 hover:bg-slate-200 duration-75">
                        <!-- Corrected image source attribute -->
                        <img class="w-52 h-52 rounded-lg" src="{{$order->album->album_cover ? asset('storage/' . $order->album->album_cover) : asset('/images/noimage.jpg')}}" alt="" />
                        <div class="font-martian">
                            <div>
                                <p class="text-gray-400 text-xl">{{$order->album->artist}}</p>
                            </div>
                            <div>
                                <p class="text-xl w-52">{{$order->album->title}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
