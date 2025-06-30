@extends('layouts.app')

@section('title', 'My Reservations')

@section('content')
    <div class="max-w-5xl mx-auto py-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-100">My Reservations</h2>
            <a href="{{ route('reservations.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">New Reservation</a>
        </div>
        <div class="overflow-x-auto bg-gray-800 shadow-lg rounded-xl border border-gray-700">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Unicorn</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Duration (h)</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr class="hover:bg-gray-700 transition">
{{--                        <td class="px-6 py-4">{{ $reservation->unicorn->name }}</td>--}}
                        <td class="px-6 py-4 whitespace-nowrap text-blue-400 font-semibold">
                            <a href="{{ route('reservations.show', $reservation) }}" class="text-indigo-400 hover:text-indigo-600">{{ $reservation->unicorn->name ?? '-' }}</a>
                        </td>
                        <td class="px-6 py-4">{{ $reservation->rent_date }}</td>
                        <td class="px-6 py-4">{{ $reservation->duration_hours }}</td>
                        <td class="px-6 py-4 flex flex-wrap gap-2">
{{--                            <a href="{{ route('reservations.show', $reservation) }}" class="text-blue-400 hover:underline">Details</a>--}}
                            <a href="{{ route('reservations.edit', $reservation) }}" class="text-yellow-400 hover:underline">Edit</a>
                            <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-400 hover:underline" onclick="return confirm('Delete this reservation?')">Delete</button>
                            </form>
                            @if(!$reservation->review)
                                <a href="{{ route('reviews.create', ['reservation' => $reservation->id]) }}" class="text-green-400 hover:underline">Review</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
