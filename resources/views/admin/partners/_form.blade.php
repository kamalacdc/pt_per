<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="name" class="form-control" required value="{{ old('name', $partner->name ?? '') }}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Logo</label>
    <input type="file" name="logo_path" class="form-control">
    @if (!empty($partner->logo_path))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="" style="max-width:150px;">
        </div>
    @endif
</div>

<div class="mb-3">
    <label>URL</label>
    <input type="url" name="url" class="form-control" value="{{ old('url', $partner->url ?? '') }}">
    @error('url')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="hidden" name="is_active" value="0">
    <label>
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $partner->is_active ?? true) ? 'checked' : '' }}>
        Aktif
    </label>
</div>
