<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('name')->paginate(15);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo_path' => 'nullable|image|max:2048',
            'url' => 'nullable|url',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('logo_path')) {
            $path = $request->file('logo_path')->store('partners', 'public');
            $data['logo_path'] = $path;
        }

        Partner::create($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo_path' => 'nullable|image|max:2048',
            'url' => 'nullable|url',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('logo_path')) {
            if ($partner->logo_path && Storage::disk('public')->exists($partner->logo_path)) {
                Storage::disk('public')->delete($partner->logo_path);
            }
            $path = $request->file('logo_path')->store('partners', 'public');
            $data['logo_path'] = $path;
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo_path && Storage::disk('public')->exists($partner->logo_path)) {
            Storage::disk('public')->delete($partner->logo_path);
        }
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus.');
    }
}
