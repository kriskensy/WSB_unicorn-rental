@extends('layouts.app')

@section('title', 'New review')

@section('content')
    <h2>New review</h2>
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select name="rating" id="rating" class="form-control" required>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error('rating') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea name="comment" id="comment" class="form-control">{{ old('comment') }}</textarea>
            @error('comment') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Add review</button>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
