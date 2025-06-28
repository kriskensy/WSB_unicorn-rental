@extends('layouts.app')

@section('title', $unicorn->name)

@section('content')
    <h2>{{ $unicorn->name }}</h2>
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Age:</strong> {{ $unicorn->age }}</li>
        <li class="list-group-item"><strong>Mane color:</strong> {{ $unicorn->mane_color }}</li>
        <li class="list-group-item"><strong>Skills:</strong> {{ $unicorn->special_skills }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $unicorn->is_active ? 'Activ' : 'Inactive' }}</li>
    </ul>
    <a href="{{ route('unicorns.index') }}" class="btn btn-secondary">Back to list</a>
@endsection
