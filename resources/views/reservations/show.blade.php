@extends('layouts.app')

@section('title', 'Reservation Details')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-transparent">
        <div class="w-full max-w-md bg-gray-800 border border-gray-700 rounded-xl shadow-lg p-8">
            <h2 class="text-3xl font-bold text-center text-gray-100 mb-8">Reservation Details</h2>
            <ul class="divide-y divide-gray-700 text-gray-200 mb-8">
                <li class="py-3 flex justify-between">
                    <span class="font-semibold">Unicorn:</span>
                    <span>{{ $reservation->unicorn->name }}</span>
                </li>
                <li class="py-3 flex justify-between">
                    <span class="font-semibold">Date:</span>
                    <span>{{ $reservation->rent_date }}</span>
                </li>
                <li class="py-3 flex justify-between">
                    <span class="font-semibold">Duration (h):</span>
                    <span>{{ $reservation->duration_hours }}</span>
                </li>
                @if($reservation->review)
                    <li class="py-3 flex flex-col">
                        <span class="font-semibold mb-1">Review:</span>
                        <span class="flex items-center">
                    @for($i = 1; $i <= 5; $i++)
                                <svg class="h-5 w-5 {{ $i <= $reservation->review->rating ? 'text-yellow-400' : 'text-gray-600' }} fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                            @endfor
                    <span class="ml-2 text-gray-300">{{ $reservation->review->comment }}</span>
                </span>
                    </li>
                @endif
            </ul>
            <div class="flex justify-center">
                <a href="{{ route('reservations.index') }}" class="px-6 py-2 bg-blue-600 text-gray-100 rounded-lg hover:bg-blue-700 transition font-semibold">Back to list</a>
            </div>
        </div>
    </div>
@endsection
