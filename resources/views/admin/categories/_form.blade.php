<div class="mb-3">
    <label class="form-label">Nama Category</label>
    <input
        type="text"
        name="name"
        class="form-control"
        required
        value="{{ old('name', $category->name ?? '') }}"
    >
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

