<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" required value="{{ old('title', $project->title ?? '') }}">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>image</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($project->image))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $project->image) }}" alt="" style="max-width:150px;">
        </div>
    @endif
</div>
<div class="mb-3">
    <label>slug</label>
    <textarea name="slug" class="form-control" rows="1">{{ old('slug', $project->slug ?? '') }}</textarea>
    @error('slug')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label>Excerpt</label>
    <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $project->excerpt ?? '') }}</textarea>
    @error('excerpt')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Content</label>
    <textarea name="content" class="form-control" rows="6">{{ old('content', $project->content ?? '') }}</textarea>
    @error('content')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="hidden" name="is_active" value="0">
    <label>
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }}>
        Aktif
    </label>
</div>
