@extends('admin.layout')

@section('title', 'Edit Type')

@section('content')
<h1>Редактирай вид</h1>

<form action="{{ route('types.update', $type->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Име</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $type->name) }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    <button type="submit" class="btn btn-success">Обнови</button>
</form>
@endsection
