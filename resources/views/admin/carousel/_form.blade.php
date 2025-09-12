<div class="mb-3">
    <label>Judul</label>
    <input
        type="text"
        name="title"
        class="form-control"
        value="{{ old('title', $carousel->title ?? '') }}">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea
        name="description"
        class="form-control"
        rows="3">{{ old('description', $carousel->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Gambar Carousel</label>
    <input
        type="file"
        name="filename"
        class="form-control">
    @error('filename')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    @if(!empty($carousel->filename))
        <div class="mt-2">
            <img
                src="{{ asset('storage/carousel/' . $carousel->filename) }}"
                alt="Preview"
                style="max-width:150px; height:auto;">
        </div>
    @endif
</div>

<div class="mb-3">
    <label>Urutan (sort order)</label>
    <input
        type="number"
        name="sort_order"
        class="form-control"
        value="{{ old('sort_order', $carousel->sort_order ?? 0) }}">
    @error('sort_order')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="hidden" name="is_active" value="0">
    <label>
        <input
            type="checkbox"
            name="is_active"
            value="1"
            {{ old('is_active', $carousel->is_active ?? true) ? 'checked' : '' }}>
        Aktif
    </label>
</div>
