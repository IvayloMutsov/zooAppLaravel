<form action="{{ route('admin.breeds.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Breed Name</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name') }}"
               required>
    </div>

    <div class="form-group mt-2">
        <label for="type_id">Type</label>
        <select name="type_id" class="form-control">
            @foreach($types as $type)
                <option value="{{ $type->id }}"
                    {{ old('type_id') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Save Breed</button>
</form>

