<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryItem;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryItemController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::with('gallery')->paginate(15);
        return view('admin.gallery_items.index', compact('galleryItems'));
    }

    public function create()
    {
        $galleries = Gallery::all();
        return view('admin.gallery_items.create', compact('galleries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'gallery_id' => 'required|exists:galleries,id',
            'path' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        GalleryItem::create($data);

        return redirect()->route('admin.gallery_items.index')
            ->with('success', 'Gallery Item berhasil ditambahkan.');
    }

    public function edit(GalleryItem $galleryItem)
    {
        $galleries = Gallery::all();
        return view('admin.gallery_items.edit', compact('galleryItem', 'galleries'));
    }

    public function update(Request $request, GalleryItem $galleryItem)
    {
        $data = $request->validate([
            'gallery_id' => 'required|exists:galleries,id',
            'path' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        $galleryItem->update($data);

        return redirect()->route('admin.gallery_items.index')
            ->with('success', 'Gallery Item berhasil diperbarui.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        $galleryItem->delete();

        return redirect()->route('admin.gallery_items.index')
            ->with('success', 'Gallery Item berhasil dihapus.');
    }
}
