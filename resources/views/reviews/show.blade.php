@extends('layouts.app')

@section('title', 'Review Details')

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <div class="bg-gray-800 shadow-lg rounded-xl p-8 border border-gray-700">
            <h2 class="text-2xl font-bold mb-6 text-gray-100">Review Details</h2>
            <ul class="space-y-3 text-gray-200">
                <li><span class="font-semibold">Unicorn:</span> {{ $review->reservation->unicorn->name }}</li>
                <li><span class="font-semibold">Rating:</span> {{ $review->rating }}/5</li>
                <li><span class="font-semibold">Comment:</span> {{ $review->comment }}</li>
            </ul>
            <div class="mt-8">
                <a href="{{ route('reviews.index') }}" class="px-6 py-2 bg-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">Back to list</a>
            </div>
        </div>
    </div>
@endsection
