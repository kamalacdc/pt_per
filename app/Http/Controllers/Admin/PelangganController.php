<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Category;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.pelanggans.index', compact('pelanggans'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.pelanggans.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'title'       => 'nullable|string|max:255',
            'tanggal_pelanggan' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'nullable|string|max:50',
            'alamat'      => 'nullable|string',
            'perusahaan'  => 'nullable|string|max:255',
        ]);

        Pelanggan::create($request->all());

        return redirect()
            ->route('admin.pelanggans.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan');
    }

    public function show(Pelanggan $pelanggan)
    {
        return view('admin.pelanggans.show', compact('pelanggan'));
    }

    public function edit(Pelanggan $pelanggan)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.pelanggans.edit', compact('pelanggan', 'categories'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'title'       => 'nullable|string|max:255',
            'tanggal_pelanggan' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'nullable|string|max:50',
            'alamat'      => 'nullable|string',
            'perusahaan'  => 'nullable|string|max:255',
        ]);

        $pelanggan->update($request->all());

        return redirect()
            ->route('admin.pelanggans.index')
            ->with('success', 'Data pelanggan berhasil diperbarui');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()
            ->route('admin.pelanggans.index')
            ->with('success', 'Data pelanggan berhasil dihapus');
    }
}
