<div class="mb-3">
    <label class="form-label">Nama Pelanggan</label>
    <input
        type="text"
        name="nama"
        class="form-control"
        required
        value="{{ old('nama', $pelanggan->nama ?? '') }}"
    >
    @error('nama')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Title</label>
    <input
        type="text"
        name="title"
        class="form-control"
        value="{{ old('title', $pelanggan->title ?? '') }}"
    >
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Pelanggan</label>
    <input
        type="date"
        name="tanggal_pelanggan"
        class="form-control"
        value="{{ old('tanggal_pelanggan', $pelanggan->tanggal_pelanggan ?? '') }}"
    >
</div>


<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- Pilih Category --</option>
        @foreach ($categories as $category)
            <option
                value="{{ $category->id }}"
                {{ old('category_id', $pelanggan->category_id ?? '') == $category->id ? 'selected' : '' }}
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input
        type="email"
        name="email"
        class="form-control"
        value="{{ old('email', $pelanggan->email ?? '') }}"
    >
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">No. Telepon</label>
    <input
        type="text"
        name="phone"
        class="form-control"
        value="{{ old('phone', $pelanggan->phone ?? '') }}"
    >
    @error('phone')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea>
    @error('alamat')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Perusahaan</label>
    <input
        type="text"
        name="perusahaan"
        class="form-control"
        value="{{ old('perusahaan', $pelanggan->perusahaan ?? '') }}"
    >
    @error('perusahaan')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
