<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder {
    public function run(): void {
        DB::table('services')->insert([
            [
                'title' => 'Konsultasi IT',
                'slug' => 'konsultasi-it',
                'excerpt' => 'Layanan konsultasi IT profesional.',
                'content' => 'Kami menyediakan solusi IT yang sesuai kebutuhan bisnis Anda.',
                'icon' => 'fa-solid fa-laptop-code',
                'image' => 'service1.jpg',
                'is_active' => 1,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pengembangan Aplikasi',
                'slug' => 'pengembangan-aplikasi',
                'excerpt' => 'Membangun aplikasi modern dan handal.',
                'content' => 'Kami mengembangkan aplikasi berbasis web dan mobile.',
                'icon' => 'fa-solid fa-mobile-alt',
                'image' => 'service2.jpg',
                'is_active' => 1,
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
