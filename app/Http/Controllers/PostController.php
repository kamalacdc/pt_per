<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()->latest()->paginate(9);
        return view('posts.index', compact('posts'));
    }

    public function show(string $slug): View
{
    $post = Post::query()
        ->where('slug', $slug)
        ->with('category') // singular, sesuai relasi
        ->firstOrFail();

    return view('posts.show', compact('post'));
}

}
