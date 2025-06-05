<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan path ke model User Anda benar
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use Illuminate\Support\Facades\DB;   // Opsional, jika ingin mengosongkan tabel dulu

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Opsional: Mengosongkan tabel users sebelum seeding
        // Hati-hati jika sudah ada data penting. Baris ini akan menghapus SEMUA user.
        // User::truncate(); // atau DB::table('users')->delete();

        // Membuat user Daru (jika belum ada atau ingin memastikan datanya seperti ini)
        User::updateOrCreate(
            ['email' => 'daru@example.com'], // Kriteria untuk mencari user yang sudah ada
            [
                'name' => 'Daru',
                'password' => Hash::make('Daruara11'), // Password di-hash
                'email_verified_at' => now(), // Opsional, jika Anda menggunakan verifikasi email
            ]
        );

        // Menambahkan user Febry
        User::updateOrCreate(
            ['email' => 'febry@example.com'],
            [
                'name' => 'Febry',
                'password' => Hash::make('Daruara11'),
                'email_verified_at' => now(),
            ]
        );

        // Menambahkan user Delon
        User::updateOrCreate(
            ['email' => 'delon@example.com'],
            [
                'name' => 'Delon',
                'password' => Hash::make('Daruara11'),
                'email_verified_at' => now(),
            ]
        );

        // Anda bisa menambahkan user lain di sini
        // Contoh:
        // User::updateOrCreate(
        //     ['email' => 'budi@example.com'],
        //     [
        //         'name' => 'Budi',
        //         'password' => Hash::make('PasswordBudi123'),
        //         'email_verified_at' => now(),
        //     ]
        // );
        // User::updateOrCreate(
        //     ['email' => 'citra@example.com'],
        //     [
        //         'name' => 'Citra',
        //         'password' => Hash::make('PasswordCitra456'),
        //         'email_verified_at' => now(),
        //     ]
        // );
    }
}