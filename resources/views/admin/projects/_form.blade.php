<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" required value="{{ old('title', $project->title ?? '') }}">
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Location</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $project->location ?? '') }}">
    @error('location')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Year</label>
    <input type="number" name="year" class="form-control" value="{{ old('year', $project->year ?? '') }}">
    @error('year')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Thumbnail</label>
    <input type="file" name="thumb_path" class="form-control">
    @if (!empty($project->thumb_path))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $project->thumb_path) }}" alt="" style="max-width:150px;">
        </div>
    @endif
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

<div class="mb-3">
    <label>Service</label>
    <select name="service_id" class="form-control">
        <option value="">Pilih Service</option>
        @foreach($services as $service)
            <option value="{{ $service->id }}" {{ old('service_id', $project->service_id ?? '') == $service->id ? 'selected' : '' }}>
                {{ $service->name }}
            </option>
        @endforeach
    </select>
    @error('service_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
