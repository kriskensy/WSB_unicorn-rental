@extends('layouts.app')

@section('title', isset($review) ? 'Edit reviw' : 'New review')

@section('content')
    <h2>{{ isset($review) ? 'Edit reviw' : 'New review' }}</h2>
    <form action="{{ isset($review) ? route('reviews.update', $review) : route('reviews.store') }}" method="POST">
        @csrf
        @if(isset($review))
            @method('PUT')
        @endif
        @if(isset($reservation))
            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
        @else
            <div class="mb-3">
                <label for="reservation_id" class="form-label">Reservation</label>
                <select name="reservation_id" id="reservation_id" class="form-control" required>
                    <option value="">-- select --</option>
                    @foreach($reservations as $reservation)
                        <option value="{{ $reservation->id }}" {{ old('reservation_id', $review->reservation_id ?? '') == $reservation->id ? 'selected' : '' }}>
                            {{ $reservation->unicorn->name }} ({{ $reservation->rent_date }})
                        </option>
                    @endforeach
                </select>
                @error('reservation_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        @endif
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select name="rating" id="rating" class="form-control" required>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating', $review->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error('rating') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" class="form-control">{{ old('comment', $review->comment ?? '') }}</textarea>
            @error('comment') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">{{ isset($review) ? 'Save' : 'Add review' }}</button>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
