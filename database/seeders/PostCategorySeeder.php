<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCategory;
use Illuminate\Support\Str;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Berita',
            'Artikel',
            'Pengumuman',
            'Event',
        ];

        foreach ($categories as $category) {
            PostCategory::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => $category . ' terbaru dari perusahaan.',
            ]);
        }
    }
}
