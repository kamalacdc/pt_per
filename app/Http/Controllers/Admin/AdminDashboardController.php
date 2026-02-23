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
use App\Models\Category;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminDashboardController extends Controller
{
//     public function index(Request $request)
//     {
//         $month = $request->get('month', 'all');
//         $year = $request->get('year', now()->year);

//         // Query pelanggans with filters
//         $pelangganQuery = Pelanggan::query();

//         if ($month !== 'all') {
//             $pelangganQuery->whereMonth('created_at', $month);
//         }

//         $pelangganQuery->whereYear('created_at', $year);

//         // Get chart data
//         $categories = Category::all();
//         $chartLabels = $categories->pluck('name');
//         $chartData = $categories->map(function ($category) use ($pelangganQuery) {
//             return (clone $pelangganQuery)->where('category_id', $category->id)->count();
//         });

//         $data = [
//             'carouselCount' => Carousel::count(),
//             'serviceCount' => Service::count(),
//             'partnerCount' => Partner::count(),
//             'testimonialCount' => Testimonial::count(),
//             'postCount' => Post::count(),
//             'galleryItemCount' => GalleryItem::count(),
//             'branchCount' => Branch::count(),
//             'projectCount' => Project::count(),
//             'pageCount' => Page::count(),
//             'chartLabels' => $chartLabels,
//             'chartData' => $chartData,
//             'month' => $month,
//             'year' => $year,
//         ];

//         return view('admin.dashboard', $data);
//     }
// }
public function index(Request $request)
    {
        $month = $request->get('month', 'all');
        $year  = $request->get('year', now()->year);

        $categories = Category::withCount([
            'pelanggans as total_pelanggan' => function ($q) use ($month, $year) {
                $q->whereYear('tanggal_pelanggan', $year);

                if ($month !== 'all') {
                    $q->whereMonth('tanggal_pelanggan', $month);
                }
            }
        ])->get();

        $chartLabels = $categories->pluck('name');
        $chartData   = $categories->pluck('total_pelanggan');

        return view('admin.dashboard', [
            'chartLabels' => $chartLabels,
            'chartData'   => $chartData,
            'month'       => $month,
            'year'        => $year,

            // counter lama tetap
            'carouselCount' => Carousel::count(),
            'serviceCount' => Service::count(),
            'partnerCount' => Partner::count(),
            'testimonialCount' => Testimonial::count(),
           
            'galleryItemCount' => GalleryItem::count(),
            'branchCount' => Branch::count(),
            'projectCount' => Project::count(),
            'pageCount' => Page::count(),
        ]);
    }
}
