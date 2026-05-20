<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\Documentation;

class TestPaginationSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            Gallery::create([
                'title' => "Test Gallery " . $i,
                'description' => "Description for gallery " . $i,
                'image_path' => "test/path",
                'event_date' => now()->subDays($i),
                'is_active' => true,
            ]);

            Documentation::create([
                'title' => "Test Documentation " . $i,
                'content' => "<p>Content for documentation " . $i . "</p>",
                'image_path' => "test/path",
                'is_active' => true,
            ]);
        }
    }
}
