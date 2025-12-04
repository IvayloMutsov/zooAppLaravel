<select name="type_id" class="form-control">
    @foreach($types as $type)
        <option value="{{ $type->id }}" {{ (old('type_id', $breed->type_id ?? '') == $type->id) ? 'selected' : '' }}>
            {{ $type->name }}
        </option>
    @endforeach
</select>
