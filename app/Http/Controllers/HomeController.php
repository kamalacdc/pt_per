<?php

namespace App\Http\Controllers;

use App\Models\{
    Service,
    Partner,
    Testimonial,
    Post,
    GalleryItem,
    Branch,
    Page,
    Setting,
    Project
};
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Ambil data carousel dari database yang aktif dan urutkan
        $slides = \App\Models\Carousel::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // cek apakah branches table punya kolom sort
        $branchesQuery = Branch::query();
        try {
            // coba orderBy sort
            $branchesQuery->orderBy('sort');
        } catch (\Exception $e) {
            // kalau kolom sort nggak ada, fallback ke id
            $branchesQuery->orderBy('id');
        }

        return view('home', [
            'slides'        => $slides,
            'services'      => Service::query()
                ->where('is_active', true)
                ->orderBy('sort')
                ->limit(8)
                ->get(),
            'partners'      => Partner::query()
                ->latest()
                ->limit(12)
                ->get(),
            'about'         => Page::query()
                ->where('slug', 'tentang-kami')
                ->first(),
            'testimonials'  => Testimonial::query()
                ->orderBy('sort')
                ->limit(10)
                ->get(),
            'posts'         => Post::query()
                ->latest()
                ->limit(3)
                ->get(),
            'galleryGroups' => GalleryItem::query()
                ->latest()
                ->limit(12)
                ->get()
                ->groupBy('category'),
            'branches'      => $branchesQuery->get(),
            'projects'      => Project::query()
                ->latest()
                ->limit(6)
                ->get(),
        ]);
    }
}
