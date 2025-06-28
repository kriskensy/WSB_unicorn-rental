@extends('layouts.app')

@section('title', 'Review details')

@section('content')
    <h2>Review details</h2>
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Unicorn:</strong> {{ $review->reservation->unicorn->name }}</li>
        <li class="list-group-item"><strong>Rating:</strong> {{ $review->rating }}/5</li>
        <li class="list-group-item"><strong>Comment:</strong> {{ $review->comment }}</li>
    </ul>
    <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Back to list</a>
@endsection
