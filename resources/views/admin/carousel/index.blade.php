{{-- resources/views/carousel/index.blade.php --}}

@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Manajemen Hero Carousel</h2>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Daftar Gambar Saat Ini --}}
    <div class="row mb-5">
        @foreach($carousels as $item)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img
                        src="{{ asset('storage/carousel/' . $item->filename) }}"
                        class="card-img-top"
                        alt="Carousel Image">
                    <div class="card-body text-center">
                        <button
                            class="btn btn-sm btn-warning"
                            data-toggle="modal"
                            data-target="#editModal-{{ $item->id }}">
                            Ganti
                        </button>
                        <form
                            action="{{ route('carousel.destroy', $item->id) }}"
                            method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus gambar ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal: Ganti Gambar -->
            <div
                class="modal fade"
                id="editModal-{{ $item->id }}"
                tabindex="-1"
                role="dialog">
                <div class="modal-dialog" role="document">
                    <form
                        action="{{ route('carousel.update', $item->id) }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ganti Gambar</h5>
                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Pilih Gambar Baru</label>
                                    <input
                                        type="file"
                                        name="hero_image"
                                        class="form-control-file"
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal">
                                    Batal
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-primary">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    {{-- Form Unggah Gambar Baru --}}
    <h4>Tambah Gambar Baru</h4>
    <form
        action="{{ route('carousel.store') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Pilih Gambar</label>
            <input
                type="file"
                name="hero_image[]"
                class="form-control-file"
                multiple
                required>
            <small class="form-text text-muted">
                Anda dapat memilih lebih dari satu gambar sekaligus.
            </small>
        </div>
        <button
            type="submit"
            class="btn btn-success">
            Unggah
        </button>
    </form>
</div>
@endsection
