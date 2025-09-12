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
