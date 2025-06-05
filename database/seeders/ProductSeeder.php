<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // Pastikan path ke model Product Anda benar
use Illuminate\Support\Facades\DB; // Opsional, jika Anda ingin mengosongkan tabel dulu

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Baris ini opsional: untuk mengosongkan tabel products setiap kali seeder dijalankan.
        // Ini akan menghapus SEMUA data produk yang ada sebelumnya.
        // Hati-hati jika Anda sudah punya data penting.
        // Product::truncate(); // atau DB::table('products')->delete();

        Product::create(['name' => 'Laptop Gaming Nitro', 'weight' => 2.5, 'value' => 15000000]);
        Product::create(['name' => 'Smartphone Flagship X', 'weight' => 0.2, 'value' => 12000000]); // Berat diubah dari 0
        Product::create(['name' => 'Kamera DSLR Pro', 'weight' => 0.8, 'value' => 20000000]);
        Product::create(['name' => 'Headphone Studio Pro', 'weight' => 0.4, 'value' => 3000000]); // Berat diubah dari 0
        Product::create(['name' => 'Tablet Grafis Expert', 'weight' => 0.7, 'value' => 5500000]);
        Product::create(['name' => 'Hard Disk Eksternal 2TB', 'weight' => 0.3, 'value' => 1200000]); // Berat diubah dari 0
        Product::create(['name' => 'Mouse Wireless Ergonomis', 'weight' => 0.1, 'value' => 450000]);
        Product::create(['name' => 'Keyboard Mekanikal RGB', 'weight' => 1.2, 'value' => 1800000]);
    }
}