<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Berita Terbaru Perusahaan',
                'excerpt' => 'Ini adalah excerpt untuk berita terbaru.',
                'content' => 'Konten lengkap dari berita terbaru perusahaan.',
                'thumb_path' => 'images/slide-1.jpg',
                'post_category_id' => 1,
            ],
            [
                'title' => 'Artikel Menarik',
                'excerpt' => 'Excerpt untuk artikel menarik.',
                'content' => 'Konten lengkap artikel menarik.',
                'thumb_path' => 'images/slide-2.jpg',
                'post_category_id' => 2,
            ],
            [
                'title' => 'Pengumuman Penting',
                'excerpt' => 'Excerpt pengumuman penting.',
                'content' => 'Konten pengumuman penting.',
                'thumb_path' => 'images/slide-3.jpg',
                'post_category_id' => 3,
            ],
        ];

        foreach ($posts as $postData) {
            if (!Post::where('slug', Str::slug($postData['title']))->exists()) {
                Post::create([
                    'title' => $postData['title'],
                    'slug' => Str::slug($postData['title']),
                    'excerpt' => $postData['excerpt'],
                    'content' => $postData['content'],
                    'published_at' => now(),
                    'thumb_path' => $postData['thumb_path'],
                    'post_category_id' => $postData['post_category_id'],
                ]);
            }
        }
    }
}
