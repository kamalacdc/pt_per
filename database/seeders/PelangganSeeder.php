<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all categories
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return; // No categories, skip seeding
        }

        // Sample data for pelanggans
        $pelanggans = [
            [
                'nama' => 'John Doe',
                'title' => 'Manager',
                'category_id' => $categories->random()->id,
                'email' => 'john@example.com',
                'phone' => '081234567890',
                'alamat' => 'Jakarta',
                'perusahaan' => 'PT ABC',
                'tanggal_pelanggan' => Carbon::now()->subMonths(rand(0, 11))->toDateString(),
            ],
            [
                'nama' => 'Jane Smith',
                'title' => 'Director',
                'category_id' => $categories->random()->id,
                'email' => 'jane@example.com',
                'phone' => '081234567891',
                'alamat' => 'Bandung',
                'perusahaan' => 'PT XYZ',
                'tanggal_pelanggan' => Carbon::now()->subMonths(rand(0, 11))->toDateString(),
            ],
            [
                'nama' => 'Bob Johnson',
                'title' => 'CEO',
                'category_id' => $categories->random()->id,
                'email' => 'bob@example.com',
                'phone' => '081234567892',
                'alamat' => 'Surabaya',
                'perusahaan' => 'PT DEF',
                'tanggal_pelanggan' => Carbon::now()->subMonths(rand(0, 11))->toDateString(),
            ],
            [
                'nama' => 'Alice Brown',
                'title' => 'Supervisor',
                'category_id' => $categories->random()->id,
                'email' => 'alice@example.com',
                'phone' => '081234567893',
                'alamat' => 'Yogyakarta',
                'perusahaan' => 'PT GHI',
                'tanggal_pelanggan' => Carbon::now()->subMonths(rand(0, 11))->toDateString(),
            ],
            [
                'nama' => 'Charlie Wilson',
                'title' => 'Engineer',
                'category_id' => $categories->random()->id,
                'email' => 'charlie@example.com',
                'phone' => '081234567894',
                'alamat' => 'Semarang',
                'perusahaan' => 'PT JKL',
                'tanggal_pelanggan' => Carbon::now()->subMonths(rand(0, 11))->toDateString(),
            ],
        ];

        foreach ($pelanggans as $pelanggan) {
            Pelanggan::create($pelanggan);
        }
    }
}
