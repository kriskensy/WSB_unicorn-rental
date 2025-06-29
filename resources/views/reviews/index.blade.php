@extends('layouts.app')

@section('title', 'My Reviews')

@section('content')
    <div class="max-w-5xl mx-auto py-10">
        <h2 class="text-2xl font-bold text-gray-100 mb-6">My Reviews</h2>
        <div class="overflow-x-auto bg-gray-800 shadow-lg rounded-xl border border-gray-700">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Unicorn</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Rating</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Comment</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr class="hover:bg-gray-700 transition">
                        <td class="px-6 py-4">{{ $review->reservation->unicorn->name }}</td>
                        <td class="px-6 py-4">{{ $review->rating }}/5</td>
                        <td class="px-6 py-4">{{ $review->comment }}</td>
                        <td class="px-6 py-4 flex flex-wrap gap-2">
                            <a href="{{ route('reviews.show', $review) }}" class="text-blue-400 hover:underline">Details</a>
                            <a href="{{ route('reviews.edit', $review) }}" class="text-yellow-400 hover:underline">Edit</a>
                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-400 hover:underline" onclick="return confirm('Delete this review?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
