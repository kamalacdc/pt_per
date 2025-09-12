<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required value="{{ old('name', $branch->name ?? '') }}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control" rows="3">{{ old('address', $branch->address ?? '') }}</textarea>
    @error('address')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $branch->phone ?? '') }}">
    @error('phone')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $branch->email ?? '') }}">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Sort</label>
    <input type="number" name="sort" class="form-control" value="{{ old('sort', $branch->sort ?? '') }}">
    @error('sort')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
