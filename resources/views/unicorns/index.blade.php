@extends('layouts.app')

@section('title', 'Unicorns')

@section('content')
    <div class="max-w-5xl mx-auto py-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-100">Unicorns List</h2>
            @can('create', App\Models\Unicorn::class)
                <a href="{{ route('unicorns.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add Unicorn</a>
            @endcan
        </div>
        <div class="overflow-x-auto bg-gray-800 shadow-lg rounded-xl border border-gray-700">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Age</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Mane Color</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Skills</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($unicorns as $unicorn)
                    <tr class="hover:bg-gray-700 transition">
                        <td class="px-6 py-4">
                            <a href="{{ route('unicorns.show', $unicorn) }}" class="text-blue-400 hover:underline">{{ $unicorn->name }}</a>
                        </td>
                        <td class="px-6 py-4">{{ $unicorn->age }}</td>
                        <td class="px-6 py-4">{{ $unicorn->mane_color }}</td>
                        <td class="px-6 py-4">{{ $unicorn->special_skills }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            @can('update', $unicorn)
                                <a href="{{ route('unicorns.edit', $unicorn) }}" class="text-yellow-400 hover:underline">Edit</a>
                            @endcan
                            @can('delete', $unicorn)
                                <form action="{{ route('unicorns.destroy', $unicorn) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-400 hover:underline" onclick="return confirm('Deactivate this unicorn?')">Deactivate</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
