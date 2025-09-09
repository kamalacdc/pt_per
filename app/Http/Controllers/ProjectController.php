<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()->latest()->paginate(9);
        return view('projects.index', compact('projects'));
    }

    public function show(string $slug): View
    {
        $project = Project::query()->where('slug',$slug)->with('partners','service')->firstOrFail();
        return view('projects.show', compact('project'));
    }
}
