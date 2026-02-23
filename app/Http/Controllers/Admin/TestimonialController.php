<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort')->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create', ['testimonial' => new Testimonial()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'photo_path' => 'nullable|image|max:2048',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
            'sort' => 'nullable|integer',
            'is_active' => 'required|boolean',

        ]);

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('testimonials', 'public');
            $data['photo_path'] = $path;
        }

        $data['sort'] = $data['sort'] ?? 0;
        $data['is_active'] = $request->boolean('is_active', true);

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'photo_path' => 'nullable|image|max:2048',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
            'sort' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',

        ]);

        if ($request->hasFile('photo_path')) {
            if ($testimonial->photo_path && Storage::disk('public')->exists($testimonial->photo_path)) {
                Storage::disk('public')->delete($testimonial->photo_path);
            }
            $path = $request->file('photo_path')->store('testimonials', 'public');
            $data['photo_path'] = $path;
        }
        $data['is_active'] = $request->boolean('is_active', true);

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo_path && Storage::disk('public')->exists($testimonial->photo_path)) {
            Storage::disk('public')->delete($testimonial->photo_path);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil dihapus.');
    }
}
