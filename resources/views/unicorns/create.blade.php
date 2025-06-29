@extends('layouts.app')

@section('title', 'Add Unicorn')

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <div class="bg-gray-800 shadow-lg rounded-xl p-8 border border-gray-700">
            <h2 class="text-2xl font-bold mb-8 text-gray-100">Add Unicorn</h2>
            <form action="{{ route('unicorns.store') }}" method="POST" class="space-y-7">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-200 mb-2">Name</label>
                    <input type="text" name="name" id="name"
                           class="w-full bg-gray-900 text-gray-100 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                           value="{{ old('name') }}" required>
                    @error('name') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="age" class="block text-sm font-semibold text-gray-200 mb-2">Age</label>
                    <input type="number" name="age" id="age"
                           class="w-full bg-gray-900 text-gray-100 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                           value="{{ old('age') }}" required>
                    @error('age') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="mane_color" class="block text-sm font-semibold text-gray-200 mb-2">Mane Color</label>
                    <input type="text" name="mane_color" id="mane_color"
                           class="w-full bg-gray-900 text-gray-100 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                           value="{{ old('mane_color') }}" required>
                    @error('mane_color') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="special_skills" class="block text-sm font-semibold text-gray-200 mb-2">Special Skills</label>
                    <input type="text" name="special_skills" id="special_skills"
                           class="w-full bg-gray-900 text-gray-100 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                           value="{{ old('special_skills') }}" required>
                    @error('special_skills') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="flex justify-end space-x-4 pt-2">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">Add</button>
                    <a href="{{ route('unicorns.index') }}" class="px-6 py-2 bg-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
