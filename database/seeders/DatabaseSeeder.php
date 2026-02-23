<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   

    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
            PartnerSeeder::class,
            BranchSeeder::class,
            PageSeeder::class,
            SettingSeeder::class,
            TestimonialSeeder::class,
            GalleryItemSeeder::class,
            ProjectSeeder::class,
            AdminSeeder::class,
            CarouselSeeder::class,
            CategoriesSeeder::class,
            PelangganSeeder::class,

        ]);
    }
}



