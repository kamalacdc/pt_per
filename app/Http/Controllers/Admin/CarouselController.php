<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::orderBy('sort_order')->paginate(15);
        return view('admin.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'filename' => 'required|image|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('filename')) {
            $path = $request->file('filename')->store('carousel', 'public');
            $data['filename'] = basename($path);
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Carousel::create($data);

        return redirect()->route('admin.carousel.index')
            ->with('success', 'Carousel berhasil ditambahkan.');
    }

    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'filename' => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('filename')) {
            if ($carousel->filename && Storage::disk('public')->exists('carousel/' . $carousel->filename)) {
                Storage::disk('public')->delete('carousel/' . $carousel->filename);
            }
            $path = $request->file('filename')->store('carousel', 'public');
            $data['filename'] = basename($path);
        }

        $data['is_active'] = $request->boolean('is_active', true);

        $carousel->update($data);

        return redirect()->route('admin.carousel.index')
            ->with('success', 'Carousel berhasil diperbarui.');
    }

    public function destroy(Carousel $carousel)
    {
        if ($carousel->filename && Storage::disk('public')->exists('carousel/' . $carousel->filename)) {
            Storage::disk('public')->delete('carousel/' . $carousel->filename);
        }
        $carousel->delete();

        return redirect()->route('admin.carousel.index')
            ->with('success', 'Carousel berhasil dihapus.');
    }
}
