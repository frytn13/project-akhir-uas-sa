<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BinarySearchController extends Controller
{
    public function index()
    {
        return view('binary-search.index');
    }

    /**
     * Handle the sorting request and show the search form.
     */
    public function sortAndSearch(Request $request)
    {
        $request->validate([
            'array' => 'required|string',
            'algorithm' => 'required|in:bubble,selection'
        ]);

        $input = explode(',', str_replace(' ', '', $request->array));
        $array = array_map('intval', $input);

        $originalArray = $array;

        $algorithm = $request->algorithm;
        $sortedArray = $algorithm === 'bubble'
            ? $this->bubbleSort($array)
            : $this->selectionSort($array);

        // Pass sorted array and other data to the view
        return view('binary-search.index', [
            'originalArray' => $originalArray,
            'sortedArray' => $sortedArray,
            'algorithm' => $algorithm
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'sorted_array' => 'required|string', // Expect sorted array as string
            'target' => 'required|numeric',
            'algorithm' => 'required|in:bubble,selection', // Add algorithm validation
            'original_array' => 'required|string', // Add original_array validation
        ]);

        // Use the already sorted array
        $input = explode(',', str_replace(' ', '', $request->sorted_array));
        $array = array_map('intval', $input);
        // Remove sort($array); as array is expected to be sorted

        $target = (int) $request->target;
        $left = 0;
        $right = count($array) - 1;
        $foundIndex = -1;

        // Binary search logic remains the same
        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);
            if ($array[$mid] === $target) {
                $foundIndex = $mid;
                break;
            } elseif ($array[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        // Pass data back to the view, including the sorted array used, the algorithm, and the original array
        return view('binary-search.index', compact('array', 'target', 'foundIndex'))->with([
            'originalArray' => array_map('intval', explode(',', str_replace(' ', '', $request->original_array))), // Pass the original array back
            'sortedArray' => $array, // Pass the array used in search back as sortedArray
            'algorithm' => $request->algorithm, // Pass the algorithm back
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
