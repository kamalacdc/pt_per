<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('published_at', 'desc')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'thumb_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumb_path')) {
            $path = $request->file('thumb_path')->store('posts', 'public');
            $data['thumb_path'] = $path;
        }

        $data['slug'] = Str::slug($data['title']);

        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'thumb_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumb_path')) {
            if ($post->thumb_path && Storage::disk('public')->exists($post->thumb_path)) {
                Storage::disk('public')->delete($post->thumb_path);
            }
            $path = $request->file('thumb_path')->store('posts', 'public');
            $data['thumb_path'] = $path;
        }

        $data['slug'] = Str::slug($data['title']);

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        if ($post->thumb_path && Storage::disk('public')->exists($post->thumb_path)) {
            Storage::disk('public')->delete($post->thumb_path);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }
}
