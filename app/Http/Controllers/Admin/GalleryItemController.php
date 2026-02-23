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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('gallery_items', 'public');
        }

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($galleryItem->image && Storage::disk('public')->exists($galleryItem->image)) {
                Storage::disk('public')->delete($galleryItem->image);
            }
            $data['image'] = $request->file('image')->store('gallery_items', 'public');
        }

        $galleryItem->update($data);

        return redirect()->route('admin.gallery_items.index')
            ->with('success', 'Gallery Item berhasil diperbarui.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        // Delete the image file if it exists
        if ($galleryItem->image && Storage::disk('public')->exists($galleryItem->image)) {
            Storage::disk('public')->delete($galleryItem->image);
        }

        $galleryItem->delete();

        return redirect()->route('admin.gallery_items.index')
            ->with('success', 'Gallery Item berhasil dihapus.');
    }
}
