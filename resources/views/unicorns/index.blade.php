@extends('layouts.app')

@section('title', 'Unicorns List')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-white">Unicorns List</h1>
        <table class="min-w-full divide-y divide-gray-700 bg-gray-800 rounded-lg overflow-hidden">
            <thead class="bg-gray-900">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Age</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Mane Color</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Skills</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Rating</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
            @foreach($unicorns as $unicorn)
                <tr class="hover:bg-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap text-blue-400 font-semibold">
                        <a href="{{ route('unicorns.show', $unicorn->id) }}">{{ $unicorn->name }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $unicorn->age }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $unicorn->mane_color }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $unicorn->special_skills }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-yellow-400">
                        @php
                            $avgRating = $unicorn->reviews->avg('rating');
                        @endphp
                        @if($avgRating)
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= round($avgRating))
                                    <svg class="inline-block h-5 w-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                                @else
                                    <svg class="inline-block h-5 w-5 fill-current text-gray-600" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.49 6.91l6.561-.955L10 0l2.949 5.955 6.561.955-4.755 4.635 1.123 6.545z"/></svg>
                                @endif
                            @endfor
                        @else
                            <span class="text-gray-400">No rating yet</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
