@extends('admin.layout')

@section('title', 'Animals')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Animals</h1>
    <a href="{{ route('animals.create') }}" class="btn btn-primary">Добави животно</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Име</th>
            <th>Вид</th>
            <th>Порода</th>
            <th>Дата на раждане</th>
            <th>Снимка</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($animals as $animal)
        <tr>
            <td>{{ $animal->id }}</td>
            <td>{{ $animal->name }}</td>
            <td>{{ $animal->type->name }}</td>
            <td>{{ $animal->breed->name }}</td>
            <td>{{ $animal->birthdate }}</td>
            <td>
                @if($animal->image)
                    <img src="{{ asset('storage/animals/'.$animal->image) }}" width="50">
                @endif
            </td>
            <td>
                <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline-block">
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
