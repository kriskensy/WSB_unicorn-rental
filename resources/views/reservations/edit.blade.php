@extends('layouts.app')

@section('title', 'Edit Reservation')

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <div class="bg-gray-800 shadow-lg rounded-xl p-8 border border-gray-700">
            <h2 class="text-2xl font-bold mb-8 text-gray-100">Edit Reservation</h2>
            <form action="{{ route('reservations.update', $reservation) }}" method="POST" class="space-y-7">
                @csrf
                @method('PUT')
                <div>
                    <label for="unicorn_id" class="block text-sm font-semibold text-gray-200 mb-2">Unicorn</label>
                    <select name="unicorn_id" id="unicorn_id"
                            class="w-full bg-gray-900 text-gray-100 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required>
                        <option value="">-- select --</option>
                        @foreach($unicorns as $unicorn)
                            <option value="{{ $unicorn->id }}" {{ old('unicorn_id', $reservation->unicorn_id) == $unicorn->id ? 'selected' : '' }}>
                                {{ $unicorn->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('unicorn_id') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="rent_date" class="block text-sm font-semibold text-gray-200 mb-2">Reservation Date</label>
                    <input type="datetime-local" name="rent_date" id="rent_date"
                           class="w-full bg-gray-900 text-gray-100 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                           value="{{ old('rent_date', $reservation->rent_date->format('Y-m-d\TH:i')) }}" required>
                    @error('rent_date') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label for="duration_hours" class="block text-sm font-semibold text-gray-200 mb-2">Duration (hours)</label>
                    <input type="number" name="duration_hours" id="duration_hours"
                           class="w-full bg-gray-900 text-gray-100 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                           value="{{ old('duration_hours', $reservation->duration_hours) }}" min="1" max="8" required>
                    @error('duration_hours') <div class="text-red-400 text-xs mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="flex justify-end space-x-4 pt-2">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">Save changes</button>
                    <a href="{{ route('reservations.index') }}" class="px-6 py-2 bg-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
