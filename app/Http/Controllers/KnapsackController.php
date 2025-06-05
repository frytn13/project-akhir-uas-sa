<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class KnapsackController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('materi.knapsack', compact('products'));
    }

    public function solve(Request $request)
    {
        $request->validate([
            'max_weight' => 'required|integer|min:1|max:100'
        ], [
            'max_weight.required' => 'Kapasitas tas harus diisi',
            'max_weight.integer' => 'Kapasitas tas harus berupa angka bulat',
            'max_weight.min' => 'Kapasitas tas minimal 1 kg',
            'max_weight.max' => 'Kapasitas tas maksimal 100 kg'
        ]);

        $maxWeight = $request->max_weight;
        $products = Product::all();

        if ($products->isEmpty()) {
            return back()->withErrors(['message' => 'Tidak ada produk yang tersedia']);
        }

        // Hitung value-to-weight ratio untuk setiap produk
        $products = $products->map(function ($product) {
            $product->value_weight_ratio = $product->value / $product->weight;
            return $product;
        });

        // Urutkan produk berdasarkan value-to-weight ratio (descending)
        $products = $products->sortByDesc('value_weight_ratio');

        $selectedProducts = [];
        $totalWeight = 0;
        $totalValue = 0;

        foreach ($products as $product) {
            if ($totalWeight + $product->weight <= $maxWeight) {
                $selectedProducts[] = $product;
                $totalWeight += $product->weight;
                $totalValue += $product->value;
            }
        }

        if (empty($selectedProducts)) {
            return back()->withErrors(['message' => 'Tidak ada produk yang dapat dimasukkan ke dalam tas']);
        }

        return view('materi.knapsack', [
            'products' => $products,
            'selectedProducts' => $selectedProducts,
            'totalWeight' => $totalWeight,
            'totalValue' => $totalValue,
            'maxWeight' => $maxWeight
        ])->with('success', 'Perhitungan berhasil dilakukan');
    }
}
