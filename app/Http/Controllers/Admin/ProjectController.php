<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('service')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.projects.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'thumb_path' => 'nullable|image|max:2048',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'service_id' => 'nullable|exists:services,id',
        ]);

        if ($request->hasFile('thumb_path')) {
            $path = $request->file('thumb_path')->store('projects', 'public');
            $data['thumb_path'] = $path;
        }

        $data['slug'] = Str::slug($data['title']);

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $services = Service::all();
        return view('admin.projects.edit', compact('project', 'services'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'thumb_path' => 'nullable|image|max:2048',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'service_id' => 'nullable|exists:services,id',
        ]);

        if ($request->hasFile('thumb_path')) {
            if ($project->thumb_path && Storage::disk('public')->exists($project->thumb_path)) {
                Storage::disk('public')->delete($project->thumb_path);
            }
            $path = $request->file('thumb_path')->store('projects', 'public');
            $data['thumb_path'] = $path;
        }

        $data['slug'] = Str::slug($data['title']);

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        if ($project->thumb_path && Storage::disk('public')->exists($project->thumb_path)) {
            Storage::disk('public')->delete($project->thumb_path);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }
}
