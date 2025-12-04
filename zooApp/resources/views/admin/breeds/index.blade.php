@extends('admin.layout')

@section('title', 'Breeds')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Breeds</h1>
    <a href="{{ route('admin.breeds.create') }}" class="btn btn-primary">Добави порода</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Име</th>
            <th>Вид</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($breeds as $breed)
        <tr>
            <td>{{ $breed->id }}</td>
            <td>{{ $breed->name }}</td>
            <td>{{ $breed->type->name }}</td>
            <td>
                <a href="{{ route('breeds.edit', $breed->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('breeds.destroy', $breed->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Сигурни ли сте?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
