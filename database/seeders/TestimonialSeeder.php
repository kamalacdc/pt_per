<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder {
    public function run(): void {
        DB::table('testimonials')->insert([
            [
                'name' => 'Budi Santoso',
                'title' => 'CEO',
                'company' => 'PT Maju Jaya',
                'body' => 'Layanan mereka sangat memuaskan dan profesional.',
                'photo_path' => 'budi.jpg',
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Aminah',
                'title' => 'Manajer IT',
                'company' => 'CV Digital Nusantara',
                'body' => 'Solusi IT yang diberikan benar-benar membantu bisnis kami.',
                'photo_path' => 'siti.jpg',
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
