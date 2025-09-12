<div class="mb-3">
    <label>Gallery</label>
    <select name="gallery_id" class="form-control" required>
        <option value="">Pilih Gallery</option>
        @foreach($galleries as $gallery)
            <option value="{{ $gallery->id }}" {{ old('gallery_id', $galleryItem->gallery_id ?? '') == $gallery->id ? 'selected' : '' }}>
                {{ $gallery->name }}
            </option>
        @endforeach
    </select>
    @error('gallery_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Path</label>
    <input type="text" name="path" class="form-control" required value="{{ old('path', $galleryItem->path ?? '') }}">
    @error('path')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Type</label>
    <input type="text" name="type" class="form-control" value="{{ old('type', $galleryItem->type ?? '') }}">
    @error('type')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Caption</label>
    <input type="text" name="caption" class="form-control" value="{{ old('caption', $galleryItem->caption ?? '') }}">
    @error('caption')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Category</label>
    <input type="text" name="category" class="form-control" value="{{ old('category', $galleryItem->category ?? '') }}">
    @error('category')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
