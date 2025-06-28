@extends('layouts.app')

@section('title', 'New reservation')

@section('content')
    <h2>New reservation</h2>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="unicorn_id" class="form-label">Unicorn</label>
            <select name="unicorn_id" id="unicorn_id" class="form-control" required>
                <option value="">-- select --</option>
                @foreach($unicorns as $unicorn)
                    <option value="{{ $unicorn->id }}" {{ old('unicorn_id') == $unicorn->id ? 'selected' : '' }}>
                        {{ $unicorn->name }}
                    </option>
                @endforeach
            </select>
            @error('unicorn_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="rent_date" class="form-label">Reservation date</label>
            <input type="datetime-local" name="rent_date" id="rent_date" class="form-control" value="{{ old('rent_date') }}" required>
            @error('rent_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="duration_hours" class="form-label">Duration (h)</label>
            <input type="number" name="duration_hours" id="duration_hours" class="form-control" value="{{ old('duration_hours', 1) }}" min="1" max="8" required>
            @error('duration_hours') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Book</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
