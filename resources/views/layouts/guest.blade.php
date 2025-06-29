@extends('layouts.app')

@section('content')
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 min-h-[60vh]">
        <div>
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/img_logo.png') }}" alt="Unicorn Rental Logo" class="w-20 h-20" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-800 rounded-lg shadow-md overflow-hidden">
            {{ $slot }}
        </div>
    </div>
@endsection
