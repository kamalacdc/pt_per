<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Tentang Kami',
                'slug' => 'tentang-kami',
                'content' => '<p>Kami adalah perusahaan teknologi yang berfokus pada solusi digital.</p>',
                'meta_title' => 'Tentang Kami - ',
                'meta_description' => 'Informasi tentang SGN sebagai perusahaan teknologi.'
            ],
            [
                'title' => 'Layanan',
                'slug' => 'layanan',
                'content' => '<p>Berbagai layanan IT mulai dari website, aplikasi mobile, hingga cloud.</p>',
                'meta_title' => 'Layanan - ',
                'meta_description' => 'Layanan IT  untuk kebutuhan digital Anda.'
            ],
            [
                'title' => 'Kontak',
                'slug' => 'kontak',
                'content' => '<p>Hubungi kami melalui form kontak atau email yang tersedia.</p>',
                'meta_title' => 'Kontak - ',
                'meta_description' => 'Kontak  untuk konsultasi layanan IT.'
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
