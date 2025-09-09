<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            ['name' => 'Google', 'logo' => 'partners/google.png', 'url' => 'https://www.google.com'],
            ['name' => 'Microsoft', 'logo' => 'partners/microsoft.png', 'url' => 'https://www.microsoft.com'],
            ['name' => 'Amazon', 'logo' => 'partners/amazon.png', 'url' => 'https://www.amazon.com'],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
