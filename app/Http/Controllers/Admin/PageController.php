<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('title')->paginate(15);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['title']);

        Page::create($data);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page berhasil ditambahkan.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
        ]);

        $data['slug'] = Str::slug($data['title']);

        $page->update($data);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page berhasil diperbarui.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page berhasil dihapus.');
    }
}
