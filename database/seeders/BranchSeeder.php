<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder {
    public function run(): void {
        DB::table('branches')->insert([
            [
                'name' => 'Kantor Pusat',
                'address' => 'Jl. Merdeka No. 10, Jakarta',
                'phone' => '0211234567',
                'email' => 'info@ptperusahaan.com',
                'map_embed' => '<iframe src="https://maps.google.com/..."></iframe>',
                'is_active' => 1,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cabang Surabaya',
                'address' => 'Jl. Pahlawan No. 22, Surabaya',
                'phone' => '031987654',
                'email' => 'surabaya@ptperusahaan.com',
                'map_embed' => '<iframe src="https://maps.google.com/..."></iframe>',
                'is_active' => 1,
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
