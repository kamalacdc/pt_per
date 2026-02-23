<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Manajemen Proyek',
                'created_at' => Carbon::parse('2025-12-30 05:40:46'),
                'updated_at' => Carbon::parse('2025-12-30 05:40:46'),
            ],
            [
                'id' => 2,
                'name' => 'Konsultasi IT',
                'created_at' => Carbon::parse('2025-12-30 05:41:07'),
                'updated_at' => Carbon::parse('2025-12-30 05:41:07'),
            ],
            [
                'id' => 3,
                'name' => 'Sistem Informasi',
                'created_at' => Carbon::parse('2025-12-30 05:41:15'),
                'updated_at' => Carbon::parse('2025-12-30 05:41:15'),
            ],
            [
                'id' => 4,
                'name' => 'Keamanan Jaringan IT',
                'created_at' => Carbon::parse('2025-12-30 05:41:27'),
                'updated_at' => Carbon::parse('2025-12-30 05:59:42'),
            ],
        ]);
    }
}