<form action="{{ route('admin.breeds.store') }}" method="POST">
    @csrf

    <select name="type_id" class="form-control">
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ old('type_id', $breed->type_id ?? '') == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-2">Save Breed</button>
</form>
