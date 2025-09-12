<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Service;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Post;
use App\Models\GalleryItem;
use App\Models\Branch;
use App\Models\Project;
use App\Models\Page;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = [
            'carousel_count' => Carousel::count(),
            'service_count' => Service::count(),
            'partner_count' => Partner::count(),
            'testimonial_count' => Testimonial::count(),
            'post_count' => Post::count(),
            'gallery_item_count' => GalleryItem::count(),
            'branch_count' => Branch::count(),
            'project_count' => Project::count(),
            'page_count' => Page::count(),
        ];

        return view('admin.dashboard', compact('data'));
    }
}
