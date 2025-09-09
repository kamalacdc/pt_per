<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function index(): View
    {
        $partners = Partner::query()->orderBy('name')->get();
        return view('pages.show', ['page' => (object)['title' => 'Mitra', 'content' => ''], 'partners'=>$partners]);
    }
}
