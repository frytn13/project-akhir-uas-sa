<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortingController extends Controller
{
    /**
     * Menampilkan halaman sorting
     */
    public function index()
    {
        return view('sorting.index');
    }

    /**
     * Memproses request sorting
     */
    public function sort(Request $request)
    {
        // Validasi input
        $request->validate([
            'array' => 'required|string',
            'algorithm' => 'required|in:bubble,selection'
        ]);

        // Konversi string ke array integer
        $array = array_map('intval', explode(',', str_replace(' ', '', $request->array)));

        // Simpan array original
        $original = $array;

        // Pilih algoritma sorting
        $algorithm = $request->algorithm;
        $sorted = $algorithm === 'bubble'
            ? $this->bubbleSort($array)
            : $this->selectionSort($array);

        // Kembalikan view dengan hasil
        return view('sorting.index', [
            'result' => [
                'original' => $original,
                'sorted' => $sorted,
                'algorithm' => $algorithm
            ]
        ]);
    }

    /**
     * Implementasi Bubble Sort
     */
    private function bubbleSort(array $arr): array
    {
        $n = count($arr);

        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    // Tukar elemen
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }

        return $arr;
    }

    /**
     * Implementasi Selection Sort
     */
    private function selectionSort(array $arr): array
    {
        $n = count($arr);

        for ($i = 0; $i < $n - 1; $i++) {
            // Temukan elemen minimum
            $min_idx = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($arr[$j] < $arr[$min_idx]) {
                    $min_idx = $j;
                }
            }

            // Tukar elemen minimum dengan elemen pertama
            if ($min_idx !== $i) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$min_idx];
                $arr[$min_idx] = $temp;
            }
        }

        return $arr;
    }
}
