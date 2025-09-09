<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder {
    public function run(): void {
        DB::table('testimonials')->insert([
            [
                'name' => 'Budi Santoso',
                'position' => 'CEO',
                'company' => 'PT Maju Jaya',
                'message' => 'Layanan mereka sangat memuaskan dan profesional.',
                'photo' => 'budi.jpg',
                'is_active' => 1,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Aminah',
                'position' => 'Manajer IT',
                'company' => 'CV Digital Nusantara',
                'message' => 'Solusi IT yang diberikan benar-benar membantu bisnis kami.',
                'photo' => 'siti.jpg',
                'is_active' => 1,
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
