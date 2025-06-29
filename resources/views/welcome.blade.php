@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[70vh] relative">
        <div class="absolute inset-0"></div>
        <div class="relative z-10 flex flex-col items-center">
            @guest
            <h1 class="text-4xl font-bold text-white mb-4">Unicorn Rental</h1>
            <p class="text-gray-300 mb-8 text-center">
                Welcome to your Unicorn Rental management app!
            </p>
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Log in</a>
                    <a href="{{ route('register') }}" class="px-6 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">Register</a>
                </div>
            @endguest
        </div>
    </div>
@endsection

