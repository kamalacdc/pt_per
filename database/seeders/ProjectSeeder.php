<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Proyek Pembangunan Gedung',
                'excerpt' => 'Proyek pembangunan gedung bertingkat di Jakarta.',
                'content' => 'Deskripsi lengkap proyek pembangunan gedung bertingkat di Jakarta.',
                'image' => 'images/slide-11.jpg',
            ],
            [
                'title' => 'Proyek Infrastruktur Jalan',
                'excerpt' => 'Proyek pembangunan infrastruktur jalan di Bandung.',
                'content' => 'Deskripsi lengkap proyek pembangunan infrastruktur jalan di Bandung.',
                'image' => 'images/slide-2.jpg',
            ],
        ];

        foreach ($projects as $projectData) {
            if (!Project::where('slug', Str::slug($projectData['title']))->exists()) {
                Project::create([
                    'title' => $projectData['title'],
                    'slug' => Str::slug($projectData['title']),
                    'excerpt' => $projectData['excerpt'],
                    'content' => $projectData['content'],
                    'image' => $projectData['image'],
                ]);
            }
        }
    }
}
