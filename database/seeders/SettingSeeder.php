<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingSeeder extends Seeder {
    public function run(): void {
        DB::table('settings')->insert([
            [
                'key' => 'master_password',
                'value' => Hash::make('admin123'), // Default master password, change this as needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // DB::table('settings')->insert([
        //     [
        //         'key' => 'hero_slides',
        //         'value' => json_encode([
        //             ['title' => 'Selamat Datang di Website Kami', 'image' => 'slide-1.jpg'],
        //             ['title' => 'Inovasi & Solusi Terbaik', 'image' => 'slide-2.jpg'],
        //             ['title' => 'peayanan dan harga jos jis', 'image' => 'slide-3.jpg'],
        //         ]),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'key' => 'site_name',
        //         'value' => 'PT. Perusahaan Anda',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
}
