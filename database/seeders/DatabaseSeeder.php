<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,          // Jalankan UserSeeder terlebih dahulu
            ProductSeeder::class,       // Kemudian ProductSeeder (atau urutan lain yang sesuai)
            UserConnectionSeeder::class, // Baru UserConnectionSeeder setelah user ada
            // Seeder lain jika ada...
        ]);
    }
}