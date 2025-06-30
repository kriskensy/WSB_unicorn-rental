{{--@extends('layouts.app')--}}

{{--@section('title', $unicorn->name)--}}

{{--@section('content')--}}
{{--    <div class="max-w-xl mx-auto py-10">--}}
{{--        <div class="bg-gray-800 shadow-lg rounded-xl p-8 border border-gray-700">--}}
{{--            <h2 class="text-2xl font-bold mb-6 text-gray-100">{{ $unicorn->name }}</h2>--}}
{{--            <ul class="space-y-3 text-gray-200">--}}
{{--                <li><span class="font-semibold">Age:</span> {{ $unicorn->age }}</li>--}}
{{--                <li><span class="font-semibold">Mane Color:</span> {{ $unicorn->mane_color }}</li>--}}
{{--                <li><span class="font-semibold">Special Skills:</span> {{ $unicorn->special_skills }}</li>--}}
{{--                <li><span class="font-semibold">Status:</span> {{ $unicorn->is_active ? 'Active' : 'Inactive' }}</li>--}}
{{--            </ul>--}}
{{--            <div class="mt-8">--}}
{{--                <a href="{{ route('unicorns.index') }}" class="px-6 py-2 bg-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">Back to list</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('layouts.app')

@section('title', $unicorn->name)

@section('content')
    <div class="max-w-2xl mx-auto py-10 px-4 text-white">
        <h1 class="text-4xl font-bold mb-6">{{ $unicorn->name }}</h1>
        <p class="mb-2">Age: <span class="text-gray-300">{{ $unicorn->age }}</span></p>
        <p class="mb-2">Mane Color: <span class="text-gray-300">{{ $unicorn->mane_color }}</span></p>
        <p class="mb-4">Skills: <span class="text-gray-300">{{ $unicorn->special_skills }}</span></p>

        <h2 class="text-2xl font-semibold mt-8 mb-4">Rating</h2>
        <div class="text-yellow-400 mb-6">
            @php
                $avgRating = $unicorn->reviews->avg('rating');
            @endphp
            @if($avgRating)
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= round($avgRating))
                        <svg class="inline-block h-6 w-6 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                    @else
                        <svg class="inline-block h-6 w-6 fill-current text-gray-600" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                    @endif
                @endfor
            @else
                <span class="text-gray-400">No rating yet</span>
            @endif
        </div>

        <h2 class="text-2xl font-semibold mt-8 mb-4">Reviews</h2>
        @if($unicorn->reviews->count() > 0)
            <ul class="space-y-4">
                @foreach($unicorn->reviews as $review)
                    <li class="bg-gray-700 p-4 rounded">
                        <div class="flex items-center mb-2">
                            <div class="text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <svg class="inline-block h-5 w-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                                    @else
                                        <svg class="inline-block h-5 w-5 fill-current text-gray-600" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                                    @endif
                                @endfor
                            </div>
                            <p class="ml-4 text-gray-300">{{ $review->comment }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-400">No reviews yet.</p>
        @endif
    </div>
@endsection
