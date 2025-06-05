<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KnapsackController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

    // Route untuk materi-materi
    Route::get('/fibonacci', [App\Http\Controllers\FibonacciController::class, 'index'])->name('fibonacci');
    Route::post('/fibonacci', [App\Http\Controllers\FibonacciController::class, 'calculate'])->name('fibonacci.calculate');

    Route::get('/sorting', [App\Http\Controllers\SortingController::class, 'index'])->name('sorting');
    Route::post('/sorting', [App\Http\Controllers\SortingController::class, 'sort'])->name('sorting.sort');

    Route::get('/greedy', [App\Http\Controllers\GreedyController::class, 'index'])->name('greedy');
    Route::post('/greedy', [App\Http\Controllers\GreedyController::class, 'calculate'])->name('greedy.calculate');

    Route::get('/materi/knapsack', [KnapsackController::class, 'index'])->name('knapsack');
    Route::post('/materi/knapsack', [KnapsackController::class, 'solve'])->name('knapsack.solve');

    Route::get('/binary-search', [App\Http\Controllers\BinarySearchController::class, 'index'])->name('binary-search');
    Route::post('/binary-search/sort', [App\Http\Controllers\BinarySearchController::class, 'sortAndSearch'])->name('binary-search.sort');
    Route::post('/binary-search', [App\Http\Controllers\BinarySearchController::class, 'search'])->name('binary-search.search');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
