<?php

namespace App\Http\Controllers;

use App\Models\{Gallery, GalleryItem};
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->query('category');
        $items = GalleryItem::query()
            ->when($category, fn($q)=>$q->where('category',$category))
            ->latest()->paginate(12);
        $categories = GalleryItem::query()->select('category')->distinct()->pluck('category');
        return view('galleries.index', compact('items','categories','category'));
    }

    public function show(string $slug): View
    {
        $gallery = Gallery::query()->where('slug',$slug)->with('items')->firstOrFail();
        return view('galleries.show', compact('gallery'));
    }
}
