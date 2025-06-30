@extends('layouts.app')

@section('title', 'Review Details')

@section('content')
    <div class="max-w-xl mx-auto py-10 px-4 text-white">
        <h1 class="text-2xl font-bold mb-6">Review for: {{ $review->reservation->unicorn->name ?? '-' }}</h1>

        <div class="mb-4">
            <span class="text-lg font-semibold">Rating: </span>
            <span class="text-yellow-400">
            @for($i = 1; $i <= 5; $i++)
                    @if($i <= $review->rating)
                        <svg class="inline-block h-6 w-6 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                    @else
                        <svg class="inline-block h-6 w-6 fill-current text-gray-600" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                    @endif
                @endfor
        </span>
        </div>
        <div class="mb-4">
            <span class="text-lg font-semibold">Comment:</span>
            <div class="text-gray-300 mt-2">{{ $review->comment }}</div>
        </div>
        <div class="mb-4">
            <span class="text-lg font-semibold">Date:</span>
            <span class="text-gray-400">{{ $review->created_at->format('Y-m-d H:i') }}</span>
        </div>
        <div class="mt-8">
            <a href="{{ route('reviews.index') }}" class="px-6 py-2 bg-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">Back to list</a>
        </div>
    </div>
@endsection
