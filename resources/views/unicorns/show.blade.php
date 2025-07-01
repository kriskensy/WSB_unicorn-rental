@extends('layouts.app')

@section('title', $unicorn->name)

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-transparent">
        <div class="w-full max-w-2xl bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-8 text-white">
            <h1 class="text-4xl font-bold text-center text-gray-100 mb-8">{{ $unicorn->name }}</h1>
            <div class="mb-6 space-y-2">
                <p>Age: <span class="text-gray-300">{{ $unicorn->age }}</span></p>
                <p>Mane Color: <span class="text-gray-300">{{ $unicorn->mane_color }}</span></p>
                <p>Skills: <span class="text-gray-300">{{ $unicorn->special_skills }}</span></p>
            </div>
            <h2 class="text-2xl font-semibold text-gray-100 mt-8 mb-4 text-center">Rating</h2>
            <div class="flex justify-center mb-8 text-yellow-400">
                @php $avgRating = $unicorn->reviews->avg('rating'); @endphp
                @if($avgRating)
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="inline-block h-6 w-6 {{ $i <= round($avgRating) ? 'text-yellow-400' : 'text-gray-600' }} fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                    @endfor
                @else
                    <span class="text-gray-400">No rating yet</span>
                @endif
            </div>
            <h2 class="text-2xl font-semibold text-gray-100 mt-8 mb-4 text-center">Reviews</h2>
            @if($unicorn->reviews->count() > 0)
                <ul class="space-y-4">
                    @foreach($unicorn->reviews as $review)
                        <li class="bg-gray-700 p-4 rounded">
                            <div class="flex items-center mb-2">
                                <div class="text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="inline-block h-5 w-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }} fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                                    @endfor
                                </div>
                                <p class="ml-4 text-gray-300">{{ $review->comment }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-400 text-center">No reviews yet.</p>
            @endif
            <div class="flex justify-center mt-8">
                <a href="{{ route('unicorns.index') }}" class="px-6 py-2 bg-blue-600 text-gray-100 rounded-lg hover:bg-blue-700 transition font-semibold">Back to list</a>
            </div>
        </div>
    </div>
@endsection
