<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan path ke model User Anda benar
use Illuminate\Support\Facades\DB; // Opsional

class UserConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Opsional: Mengosongkan tabel user_user (pivot table pertemanan) sebelum seeding.
        // Hati-hati jika sudah ada data penting.
        // DB::table('user_user')->truncate(); // atau delete()

        $daru = User::where('email', 'daru@example.com')->first();
        $febry = User::where('email', 'febry@example.com')->first();
        $delon = User::where('email', 'delon@example.com')->first();
        // $budi = User::where('email', 'budi@example.com')->first(); // Jika Anda menambahkan Budi
        // $citra = User::where('email', 'citra@example.com')->first(); // Jika Anda menambahkan Citra

        // Pastikan semua user ditemukan sebelum membuat koneksi
        if ($daru && $febry) {
            // Daru berteman dengan Febry (dan sebaliknya untuk relasi simetris)
            $daru->friends()->syncWithoutDetaching([$febry->id]); // syncWithoutDetaching mencegah duplikasi
            $febry->friends()->syncWithoutDetaching([$daru->id]);
        }

        if ($daru && $delon) {
            // Daru berteman dengan Delon
            $daru->friends()->syncWithoutDetaching([$delon->id]);
            $delon->friends()->syncWithoutDetaching([$daru->id]);
        }

        if ($febry && $delon) {
            // Febry berteman dengan Delon
            $febry->friends()->syncWithoutDetaching([$delon->id]);
            $delon->friends()->syncWithoutDetaching([$febry->id]);
        }

        // Contoh koneksi lain jika Anda menambahkan Budi dan Citra:
        // if ($daru && $budi) {
        //     $daru->friends()->syncWithoutDetaching([$budi->id]);
        //     $budi->friends()->syncWithoutDetaching([$daru->id]);
        // }
        // if ($febry && $citra) {
        //     $febry->friends()->syncWithoutDetaching([$citra->id]);
        //     $citra->friends()->syncWithoutDetaching([$febry->id]);
        // }
    }
}