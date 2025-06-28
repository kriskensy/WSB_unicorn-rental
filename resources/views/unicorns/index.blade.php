@extends('layouts.app')

@section('title', 'Unicorns')

@section('content')
    <h2>Unicorns list</h2>
    @can('create', App\Models\Unicorn::class)
        <a href="{{ route('unicorns.create') }}" class="btn btn-primary mb-3">Add unicorn</a>
    @endcan
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Mane color</th>
            <th>Skills</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unicorns as $unicorn)
            <tr>
                <td>
                    <a href="{{ route('unicorns.show', $unicorn) }}">{{ $unicorn->name }}</a>
                </td>
                <td>{{ $unicorn->age }}</td>
                <td>{{ $unicorn->mane_color }}</td>
                <td>{{ $unicorn->special_skills }}</td>
                <td>
                    @can('update', $unicorn)
                        <a href="{{ route('unicorns.edit', $unicorn) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endcan
                    @can('delete', $unicorn)
                        <form action="{{ route('unicorns.destroy', $unicorn) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Deactivate unicorn?')">Deactivate</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
