<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreedyController extends Controller
{
    /**
     * Menampilkan halaman coin change
     */
    public function index()
    {
        return view('greedy.index');
    }

    /**
     * Menghitung kombinasi koin menggunakan algoritma greedy
     */
    public function calculate(Request $request)
    {
        // Validasi input
        $request->validate([
            'target' => 'required|numeric|min:1',
            'coins' => 'required|string'
        ]);

        // Konversi string koin ke array integer dan urutkan descending
        $coins = array_map('intval', explode(',', str_replace(' ', '', $request->coins)));
        rsort($coins);

        $target = (int) $request->target;
        $remaining = $target;
        $usedCoins = [];
        $totalUsed = 0;

        // Inisialisasi array untuk menyimpan jumlah koin yang digunakan
        foreach ($coins as $coin) {
            $usedCoins[$coin] = 0;
        }

        // Algoritma greedy
        foreach ($coins as $coin) {
            while ($remaining >= $coin) {
                $remaining -= $coin;
                $usedCoins[$coin]++;
                $totalUsed++;
            }
        }

        // Siapkan data untuk view
        $result = [
            'target' => $target,
            'available_coins' => $coins,
            'coin_combinations' => $usedCoins,
            'total_coins' => $totalUsed,
            'unreachable' => $remaining > 0
        ];

        // Jika target tidak bisa dicapai, tambahkan pesan error
        if ($remaining > 0) {
            return view('greedy.index')
                ->with('result', $result)
                ->with('error', "Target tidak bisa dicapai. Sisa: {$remaining}");
        }

        return view('greedy.index', ['result' => $result]);
    }
}
