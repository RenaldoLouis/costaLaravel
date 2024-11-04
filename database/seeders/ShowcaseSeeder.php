<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Showcase;

class ShowcaseSeeder extends Seeder
{
    public function run()
    {
        Showcase::create([
            'name' => 'Costa Collect',
            'slug' => 'costa-collect',
        ]);

    }
}
