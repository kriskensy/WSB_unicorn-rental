@extends('layouts.app')

@section('title', 'Review Details')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-transparent">
        <div class="w-full max-w-md bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-center text-gray-100 mb-8">Review for: {{ $review->reservation->unicorn->name ?? '-' }}</h1>
            <div class="mb-6 flex items-center text-gray-200 justify-center">
                <span class="text-lg font-semibold mr-2">Rating:</span>
                <span>
                @for($i = 1; $i <= 5; $i++)
                        <svg class="inline-block h-6 w-6 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }} fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                    @endfor
            </span>
            </div>
            <div class="mb-6 text-gray-200">
                <span class="text-lg font-semibold">Comment:</span>
                <div class="text-gray-300 mt-2">{{ $review->comment }}</div>
            </div>
            <div class="mb-8 text-gray-200">
                <span class="text-lg font-semibold">Date:</span>
                <span class="text-gray-400">{{ $review->created_at->format('Y-m-d H:i') }}</span>
            </div>
            <div class="flex justify-center">
                <a href="{{ route('reviews.index') }}" class="px-6 py-2 bg-blue-600 text-gray-100 rounded-lg hover:bg-blue-700 transition font-semibold">Back to list</a>
            </div>
        </div>
    </div>
@endsection
