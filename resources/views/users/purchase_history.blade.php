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

<h4 class="justify-center text-4xl text-center">Your purchase history</h4>
<hr class="border-t-2 border-gray-700 mt-4 w-1/3 mx-auto">

<div class="flex justify-center mt-6"> <!-- Centering the table -->
    <div class="max-w-4xl"> <!-- Adjusting the maximum width -->
        @if(count($orders) > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Cover</th>
                        <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Artist</th>
                        <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Title</th>
                        <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Price</th>
                        <th class="px-10 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Purchase date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-xl">
                    @foreach($orders as $order)
                        <tr>
                            <td class="px-26 py-6 whitespace-nowrap">
                                <img class="w-35 h-35 rounded-lg" src="{{$order->album->album_cover ? asset('storage/' . $order->album->album_cover) : asset('/images/noimage.jpg')}}" alt="" />
                            </td>
                            <td class="px-10 py-6 whitespace-nowrap">{{ $order->album->artist }}</td>
                            <td class="px-10 py-6 whitespace-nowrap">{{ $order->album->title }}</td>
                            <td class="px-10 py-6 whitespace-nowrap">{{ $order->album->price }}</td>
                            <td class="px-10 py-6 whitespace-nowrap">{{ $order->created_at->format('Y-m-d')}}</td>
                    @endforeach
                    <tr>
                        <td colspan="3" class="px-10 py-6 text-right font-semibold">Total sum of your orders:</td>
                        <td colspan="2" class="px-10 py-6 whitespace-nowrap text-red-800 font-extrabold">{{ $totalAmount }}</td>
                    </tr>
                </tbody>
            </table>
        @else
            <p class="text-center">No orders found</p>
        @endif
    </div>
</div>

@endsection
