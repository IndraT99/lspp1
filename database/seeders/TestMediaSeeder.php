<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\Documentation;

class TestMediaSeeder extends Seeder
{
    public function run()
    {
        Gallery::factory()->count(15)->create();
        Documentation::factory()->count(15)->create();
    }
}
