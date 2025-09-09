<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::query()->orderBy('sort')->paginate(12);
        return view('testimonials.index', compact('testimonials'));
    }
}
