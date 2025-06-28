@extends('layouts.app')

@section('title', 'My reservations')

@section('content')
    <h2>My reservations</h2>
    <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">New reservation</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Unicorn</th>
            <th>Rental date</th>
            <th>Hours (h)</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->unicorn->name }}</td>
                <td>{{ $reservation->rent_date }}</td>
                <td>{{ $reservation->duration_hours }}</td>
                <td>
                    <a href="{{ route('reservations.show', $reservation) }}" class="btn btn-sm btn-info">Details</a>
                    <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Remove the reservation?')">Delete</button>
                    </form>
                    @if(!$reservation->review)
                        <a href="{{ route('reviews.create', ['reservation_id' => $reservation->id]) }}" class="btn btn-sm btn-success">Rate</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
