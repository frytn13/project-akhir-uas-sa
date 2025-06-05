<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $materials = [
            [
                'title' => 'Routing & Controller + Fibonacci Rekursif',
                'description' => 'Implementasi routing dan controller dengan algoritma Fibonacci rekursif',
                'route' => 'fibonacci'
            ],
            [
                'title' => 'Blade Template + Sorting',
                'description' => 'Implementasi Blade template dengan algoritma sorting (Bubble/Selection)',
                'route' => 'sorting'
            ],
            [
                'title' => 'Request & Validation + Greedy',
                'description' => 'Implementasi request validation dengan algoritma Greedy (Coin Change)',
                'route' => 'greedy'
            ],
            [
                'title' => 'Model & Migration + Knapsack',
                'description' => 'Implementasi model dan migration dengan Knapsack Problem',
                'route' => 'knapsack'
            ],
            [
                'title' => 'Service Layer + Divide and Conquer',
                'description' => 'Implementasi Service Layer Pattern dengan Binary Search',
                'route' => 'binary-search'
            ]
        ];

        return view('dashboard', compact('materials'));
    }
}
