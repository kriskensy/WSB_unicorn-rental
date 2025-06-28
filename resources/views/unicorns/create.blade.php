@extends('layouts.app')

@section('title', 'Add unicorn')

@section('content')
    <h2>Add unicorn</h2>
    <form action="{{ route('unicorns.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}" required>
            @error('age') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="mane_color" class="form-label">Mane color</label>
            <input type="text" name="mane_color" id="mane_color" class="form-control" value="{{ old('mane_color') }}" required>
            @error('mane_color') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="special_skills" class="form-label">Skills</label>
            <input type="text" name="special_skills" id="special_skills" class="form-control" value="{{ old('special_skills') }}" required>
            @error('special_skills') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Add</button>
        <a href="{{ route('unicorns.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
