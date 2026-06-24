<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil seeder ruangan yang telah kita buat
        $this->call([
            UserSeeder::class,
            DataRuanganSeeder::class,
        ]);
    }
}
