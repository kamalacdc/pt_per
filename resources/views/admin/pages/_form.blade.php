<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="title" class="form-control" required value="{{ old('title', $page->title ?? '') }}">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Konten</label>
    <textarea name="content" class="form-control" rows="10">{{ old('content', $page->content ?? '') }}</textarea>
    @error('content')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label>nama konten</label>
    <textarea name="meta_title" class="form-control" rows="10">{{ old('meta_title', $page->meta_title ?? '') }}</textarea>
    @error('meta_title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label>isi konten</label>
    <textarea name="meta_description" class="form-control" rows="10">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
    @error('meta_description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3 form-check">
    <input type="hidden" name="is_active" value="0">
    <label>
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $page->is_active ?? true) ? 'checked' : '' }}>
        Aktif
    </label>
</div>
