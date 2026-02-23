<div class="mb-3">
    <label>Gallery</label>
    <select name="gallery_id" class="form-control" required style="z-index: 1050; background-color: white; color: black;">
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
    <label>Image</label>
    <input type="file" name="image" class="form-control" {{ isset($galleryItem) ? '' : 'required' }}>
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $galleryItem->title ?? '') }}">
    @error('title')
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

<div class="mb-3 form-check">
    <input type="hidden" name="is_active" value="0">
    <label>
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $galleryItem->is_active ?? true) ? 'checked' : '' }}>
        Aktif
    </label>
</div>
