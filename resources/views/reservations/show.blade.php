@extends('layouts.app')

@section('title', 'Reservation details')

@section('content')
    <h2>Reservation details</h2>
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Unicorn:</strong> {{ $reservation->unicorn->name }}</li>
        <li class="list-group-item"><strong>Date:</strong> {{ $reservation->rent_date }}</li>
        <li class="list-group-item"><strong>Hours (h):</strong> {{ $reservation->duration_hours }}</li>
        @if($reservation->review)
            <li class="list-group-item"><strong>Review:</strong> {{ $reservation->review->rating }}/5 - {{ $reservation->review->comment }}</li>
        @endif
    </ul>
    <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back to list</a>
@endsection
