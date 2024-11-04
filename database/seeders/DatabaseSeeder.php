<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Jalankan seeder untuk showcases terlebih dahulu
        $this->call([
            ShowcaseSeeder::class,
            SectionSeeder::class,
        ]);
    }
}
