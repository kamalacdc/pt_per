<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryItem;

class GalleryItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'gallery_id' => 1,
                'title' => 'Gambar 1',
                'image' => 'images/slide-1.jpg',
                'category' => 'Utama',
            ],
            [
                'gallery_id' => 1,
                'title' => 'Gambar 2',
                'image' => 'images/slide-2.jpg',
                'category' => 'Utama',
            ],
            [
                'gallery_id' => 2,
                'title' => 'Gambar Proyek 1',
                'image' => 'images/slide-3.jpg',
                'category' => 'Proyek',
            ],
        ];

        foreach ($items as $itemData) {
            GalleryItem::create($itemData);
        }
    }
}
