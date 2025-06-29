@extends('layouts.app')

@section('title', 'Reservation Details')

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <div class="bg-gray-800 shadow-lg rounded-xl p-8 border border-gray-700">
            <h2 class="text-2xl font-bold mb-6 text-gray-100">Reservation Details</h2>
            <ul class="space-y-3 text-gray-200">
                <li><span class="font-semibold">Unicorn:</span> {{ $reservation->unicorn->name }}</li>
                <li><span class="font-semibold">Date:</span> {{ $reservation->rent_date }}</li>
                <li><span class="font-semibold">Duration (h):</span> {{ $reservation->duration_hours }}</li>
                @if($reservation->review)
                    <li>
                        <span class="font-semibold">Review:</span>
                        {{ $reservation->review->rating }}/5 - {{ $reservation->review->comment }}
                    </li>
                @endif
            </ul>
            <div class="mt-8">
                <a href="{{ route('reservations.index') }}" class="px-6 py-2 bg-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">Back to list</a>
            </div>
        </div>
    </div>
@endsection
