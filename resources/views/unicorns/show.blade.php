@extends('layouts.app')

@section('title', $unicorn->name)

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <div class="bg-gray-800 shadow-lg rounded-xl p-8 border border-gray-700">
            <h2 class="text-2xl font-bold mb-6 text-gray-100">{{ $unicorn->name }}</h2>
            <ul class="space-y-3 text-gray-200">
                <li><span class="font-semibold">Age:</span> {{ $unicorn->age }}</li>
                <li><span class="font-semibold">Mane Color:</span> {{ $unicorn->mane_color }}</li>
                <li><span class="font-semibold">Special Skills:</span> {{ $unicorn->special_skills }}</li>
                <li><span class="font-semibold">Status:</span> {{ $unicorn->is_active ? 'Active' : 'Inactive' }}</li>
            </ul>
            <div class="mt-8">
                <a href="{{ route('unicorns.index') }}" class="px-6 py-2 bg-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">Back to list</a>
            </div>
        </div>
    </div>
@endsection
