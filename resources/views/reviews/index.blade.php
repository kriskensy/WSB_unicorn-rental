@extends('layouts.app')

@section('title', 'My reviews')

@section('content')
    <h2>My reviews</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Unicorn</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->reservation->unicorn->name }}</td>
                <td>{{ $review->rating }}/5</td>
                <td>{{ $review->comment }}</td>
                <td>
                    <a href="{{ route('reviews.show', $review) }}" class="btn btn-sm btn-info">Details</a>
                    <a href="{{ route('reviews.edit', $review) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Remove review?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
