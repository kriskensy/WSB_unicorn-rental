@extends('layouts.app')

@section('title', 'New Review')

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <div class="bg-gray-800 shadow-lg rounded-xl p-8 border border-gray-700">
            <h2 class="text-2xl font-bold mb-8 text-gray-100">New Review</h2>
            <form action="{{ route('reviews.store') }}" method="POST" class="space-y-7">
                @csrf
                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                <div>
                    <label for="rating" class="block text-sm font-semibold text-gray-200 mb-2">Rating</label>
                    <select name="rating" id="rating"
                            class="w-full bg-gray-900 text-gray-100 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('rating') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="comment" class="block text-sm font-semibold text-gray-200 mb-2">Comment</label>
                    <textarea name="comment" id="comment"
                              class="w-full bg-gray-900 text-gray-100 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                              rows="3">{{ old('comment') }}</textarea>
                    @error('comment') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="flex justify-end space-x-4 pt-2">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">Add Review</button>
                    <a href="{{ route('reviews.index') }}" class="px-6 py-2 bg-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
