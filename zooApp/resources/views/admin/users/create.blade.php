@extends('admin.layout')

@section('title', 'Добави потребител')

@section('content')
<h1>Добави нов потребител</h1>

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Име</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Имейл</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Парола</label>
        <input type="password" name="password" class="form-control">
        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Повтори паролата</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Създай потребител</button>
</form>
@endsection
