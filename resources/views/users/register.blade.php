@extends('layout')
@section('content')
<div class="flex flex-col items-center mt-2">
    <h4 class="justify-center text-3xl text-center mt-8">Register</h4>
    <hr class="border-t-2 border-gray-700 mt-4 w-1/4 mx-auto">
    <form method="POST" action="/users">
        @csrf
        <div class="flex flex-col items-center justify-center"> <!-- Added w-full and md:w-96 for max-width -->
            <div class="name-input">
                <input class="w-80 h-12 border-2 border-gray-400 rounded-md px-4 py-2 font-martian text-lg text-center mt-8" placeholder="Full name" name="name" value="{{old('name')}}">
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="email-input">
                <input class="w-80 h-12 border-2 border-gray-400 rounded-md px-4 py-2 font-martian text-lg text-center mt-8" placeholder="E-mail" name="email" value="{{old('email')}}">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="password-input">
                <input class="w-80 h-12 border-2 border-gray-400 rounded-md px-4 py-2 font-martian text-lg text-center mt-8" placeholder="Password" type="password" name="password" value="{{old('password')}}">
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="confirm-password">
                <input class="w-80 h-12 border-2 border-gray-400 rounded-md px-4 py-2 font-martian text-lg text-center mt-8" placeholder="Confirm password" type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div>
                <button class="bg-blue-50 border-2 border-gray-400 w-full md:w-96 h-12 md:h-14 mt-8 rounded-lg font-martian text-lg" type="submit">Sign up</button>
            </div>
        </div>
</div>

@endsection
