<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort')->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

   public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:191',
        'icon' => 'nullable|string|max:191',
        'excerpt' => 'nullable|string',
        'content' => 'nullable|string',
        'is_active' => 'sometimes|boolean',
        'sort' => 'nullable|integer',
        'image' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('services', 'public');
        $data['image'] = $path;
    }

    $data['slug'] = Str::slug($data['title']);
    $data['is_active'] = $request->boolean('is_active', true);
    $data['sort'] = $data['sort'] ?? 0;

    Service::create($data);

    return redirect()->route('admin.services.index')
        ->with('success', 'Service berhasil ditambahkan.');
}


    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
{
    $data = $request->validate([
        'title' => 'required|string|max:191',
        'icon' => 'nullable|string|max:191',
        'excerpt' => 'nullable|string',
        'content' => 'nullable|string',
        'is_active' => 'sometimes|boolean',
        'sort' => 'nullable|integer',
        'image' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('image')) {
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }
        $path = $request->file('image')->store('services', 'public');
        $data['image'] = $path;
    }

    $data['slug'] = Str::slug($data['title']);
    $data['is_active'] = $request->boolean('is_active', true);

    $service->update($data);

    return redirect()->route('admin.services.index')
        ->with('success', 'Service berhasil diperbarui.');
        if ($request->hasFile('image')) {
    dd($request->file('image'));
}

}


    public function destroy(Service $service)
    {
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service berhasil dihapus.');
    }
    
}
