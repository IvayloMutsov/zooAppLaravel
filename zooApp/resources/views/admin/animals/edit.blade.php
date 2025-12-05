<form action="{{ route('admin.animals.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Име</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $animal->name ?? '') }}" required>
    </div>

    <!-- Type -->
    <div class="mb-3">
        <label class="form-label">Избери вид</label>
        <select name="type_id" class="form-control" required>
            @foreach($types as $type)
                <option value="{{ $type->id }}" 
                    {{ old('type_id', $animal->type_id ?? '') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Breed -->
    <div class="mb-3">
        <label class="form-label">Порода</label>
        <select name="breed_id" class="form-control" required>
            @foreach($breeds as $breed)
                <option value="{{ $breed->id }}"
                    {{ old('breed_id', $animal->breed_id ?? '') == $breed->id ? 'selected' : '' }}>
                    {{ $breed->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Birthdate -->
    <div class="mb-3">
        <label class="form-label">Дата на раждане</label>
        <input type="date" name="birthdate" class="form-control"
               value="{{ old('birthdate', $animal->birthdate ?? '') }}" required>
    </div>

    <!-- Image -->
    <div class="mb-3">
        <label class="form-label">Снимка</label>
        <input type="file" name="image" class="form-control">

        @if(!empty($animal->image))
            <img src="{{ asset('storage/animals/'.$animal->image) }}" width="100" class="mt-2">
        @endif
    </div>

    <button class="btn btn-primary">Запази</button>
</form>

