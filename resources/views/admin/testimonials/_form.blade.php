<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="name" class="form-control" required value="{{ old('name', $testimonial->name ?? '') }}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $testimonial->title ?? '') }}">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Company</label>
    <input type="text" name="company" class="form-control" value="{{ old('company', $testimonial->company ?? '') }}">
    @error('company')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Foto</label>
    <input type="file" name="photo_path" class="form-control">
    @if (!empty($testimonial->photo_path))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $testimonial->photo_path) }}" alt="" style="max-width:150px;">
        </div>
    @endif
</div>

<div class="mb-3">
    <label>Body</label>
    <textarea name="body" class="form-control" rows="5" required>{{ old('body', $testimonial->body ?? '') }}</textarea>
    @error('body')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Published At</label>
    <input type="date" name="published_at" class="form-control" value="{{ old('published_at', $testimonial->published_at ? $testimonial->published_at->format('Y-m-d') : '') }}">
    @error('published_at')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Sort</label>
    <input type="number" name="sort" class="form-control" value="{{ old('sort', $testimonial->sort ?? '') }}">
    @error('sort')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
