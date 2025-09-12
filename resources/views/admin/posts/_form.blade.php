<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" required value="{{ old('title', $post->title ?? '') }}">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Excerpt</label>
    <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    @error('excerpt')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Content</label>
    <textarea name="content" class="form-control" rows="6">{{ old('content', $post->content ?? '') }}</textarea>
    @error('content')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Thumbnail</label>
    <input type="file" name="thumb_path" class="form-control">
    @if (!empty($post->thumb_path))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $post->thumb_path) }}" alt="" style="max-width:150px;">
        </div>
    @endif
</div>

<div class="mb-3">
    <label>Published At</label>
    <input type="date" name="published_at" class="form-control" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : '') }}">
    @error('published_at')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
