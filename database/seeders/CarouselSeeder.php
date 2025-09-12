<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarouselSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('carousels')->insert([
            [
                'title' => 'Slide 1',
                'description' => 'Deskripsi slide 1',
                'filename' => 'slide-1.jpg',
                'sort_order' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Slide 2',
                'description' => 'Deskripsi slide 2',
                'filename' => 'slide-2.jpg',
                'sort_order' => 2,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Slide 3',
                'description' => 'Deskripsi slide 3',
                'filename' => 'slide-3.jpg',
                'sort_order' => 3,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
