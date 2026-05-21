<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\Documentation;

class DummySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            Gallery::create([
                'title' => 'Gallery ' . $i,
                'description' => 'Description ' . $i,
                'image_path' => 'dummy.jpg',
                'event_date' => now(),
                'is_active' => true,
            ]);
        }

        for ($i = 0; $i < 15; $i++) {
            Documentation::create([
                'title' => 'Doc ' . $i,
                'content' => 'Content ' . $i,
                'image_path' => 'dummy.jpg',
                'is_active' => true,
            ]);
        }
    }
}
