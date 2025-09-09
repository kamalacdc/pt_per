<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="title" class="form-control" required value="{{ old('title', $service->title ?? '') }}">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Icon (class)</label>
    <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon ?? '') }}">
    <small class="text-muted">Contoh: bi-gear</small>
</div>

<div class="mb-3">
    <label>Excerpt</label>
    <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $service->excerpt ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Konten</label>
    <textarea name="content" class="form-control" rows="5">{{ old('content', $service->content ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Gambar</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($service->image))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $service->image) }}" alt="" style="max-width:150px;">
        </div>
    @endif
</div>

<div class="mb-3 form-check">
    <input type="hidden" name="is_active" value="0">
    <label>
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
        Aktif
    </label>

</div>

<div class="mb-3">
    <label>Urutan (sort)</label>
    <input type="number" name="sort" class="form-control" value="{{ old('sort', $service->sort ?? 0) }}">
</div>
