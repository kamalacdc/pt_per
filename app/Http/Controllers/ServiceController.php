<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::query()->where('is_active',true)->orderBy('sort')->get();
        return view('services.index', compact('services'));
    }

    public function show(string $slug): View
    {
        $service = Service::query()->where('slug',$slug)->firstOrFail();
        return view('services.show', compact('service'));
    }
}
