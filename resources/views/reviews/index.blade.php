@extends('layouts.app')

@section('title', 'My Reviews')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-white">My Reviews</h1>
        <table class="min-w-full divide-y divide-gray-700 bg-gray-800 rounded-lg overflow-hidden">
            <thead class="bg-gray-900">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Unicorn</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Rating</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Comment</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                <th class="relative px-6 py-3 text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
            @foreach($reviews as $review)
                <tr class="hover:bg-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap text-blue-400 font-semibold">
                        <a href="{{ route('reviews.show', $review) }}" class="text-indigo-400 hover:text-indigo-600">{{ $review->reservation->unicorn->name ?? '-' }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-yellow-400">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->rating)
                                <svg class="inline-block h-5 w-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                            @else
                                <svg class="inline-block h-5 w-5 fill-current text-gray-600" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                            @endif
                        @endfor
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $review->comment }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-400">{{ $review->created_at->format('Y-m-d H:i') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-2">
                        <a href="{{ route('reviews.edit', $review) }}" class="text-yellow-400 hover:text-yellow-600">Edit</a>
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-600" onclick="return confirm('Delete this review?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
