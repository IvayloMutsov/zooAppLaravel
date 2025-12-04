@extends('admin.layout')

@section('title', 'Users')

@section('content')
<div class="container">
    <h1>Потребители</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Добави потребител</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Име</th>
                <th>Имейл</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Сигурни ли сте?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
