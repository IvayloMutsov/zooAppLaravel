@extends('admin.layout')

@section('title', 'Types')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Types</h1>
    <a href="{{ route('types.create') }}" class="btn btn-primary">Добави нов вид</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Име</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
        <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td>
                <a href="{{ route('types.edit', $type->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('types.destroy', $type->id) }}" method="POST" style="display:inline-block">
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
