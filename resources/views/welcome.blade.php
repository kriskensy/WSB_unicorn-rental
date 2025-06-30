@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    <!--stylowanie do efektu glow-->
<style>
    @keyframes unicorn-glow {
        0%, 100% {
            text-shadow:
                0 0 10px #fff,
                0 0 40px #f472b6,
                0 0 80px #f472b6;
        }
        50% {
            text-shadow:
                0 0 20px #fff,
                0 0 80px #f9a8d4,
                0 0 120px #f9a8d4;
        }
    }
    .unicorn-glow {
        animation: unicorn-glow 2s ease-in-out infinite;
    }
</style>

<div class="relative z-10 flex flex-col items-center justify-center min-h-[70vh]">
        <h1 class="unicorn-glow font-extrabold mb-4 text-white"
            style="font-size:7vw; letter-spacing:0.07em; text-align:center;">
            Unicorn Rental
        </h1>
        <div class="flex-1 flex flex-col justify-center w-full">
        <p class="unicorn-glow font-bold mb-8 text-pink-200 text-center"
           style="font-size:3vw; letter-spacing:0.09em;">
            Ride the magic, rent a unicorn today!
        </p>
        </div>
    </div>
@endsection
