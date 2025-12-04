<div class="mb-3">
    <label class="form-label">Избери вид</label>
    <select name="type_id" class="form-control">
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ old('type_id', $animal->type_id ?? '') == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Снимка</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($animal->image))
        <img src="{{ asset('storage/animals/'.$animal->image) }}" width="100" class="mt-2">
    @endif
</div>
