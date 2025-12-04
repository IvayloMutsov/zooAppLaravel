@extends('admin.layout')

@section('title', 'Добави Type')

@section('content')
<h1>Добави нов вид</h1>

<form action="{{ route('types.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Име</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <button type="submit" class="btn btn-success">Запази</button>
</form>
@endsection
