<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-2">Selamat Datang di Dashboard Strategi Algoritma</h1>
                <p class="text-gray-500 text-lg">Pilih salah satu materi algoritma berikut untuk memulai pembelajaran.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="{{ route('fibonacci') }}" class="block bg-white rounded-xl shadow hover:shadow-lg transition-all duration-500 ease-in-out hover:scale-[1.02] p-6 cursor-pointer animate__animated animate__fadeInUp animate__delay-0s">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">🔁</span>
                        <span class="font-semibold text-lg">Fibonacci</span>
                    </div>
                    <p class="text-gray-500 text-sm">Pelajari deret angka di mana setiap angka adalah jumlah dari dua angka sebelumnya, dan lihat implementasinya dalam kode.</p>
                </a>
                <a href="{{ route('sorting') }}" class="block bg-white rounded-xl shadow hover:shadow-lg transition-all duration-500 ease-in-out hover:scale-[1.02] p-6 cursor-pointer animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">🧮</span>
                        <span class="font-semibold text-lg">Sorting</span>
                    </div>
                    <p class="text-gray-500 text-sm">Pahami cara mengurutkan data menggunakan berbagai algoritma seperti Bubble Sort dan Selection Sort.</p>
                </a>
                <a href="{{ route('greedy') }}" class="block bg-white rounded-xl shadow hover:shadow-lg transition-all duration-500 ease-in-out hover:scale-[1.02] p-6 cursor-pointer animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">⚙️</span>
                        <span class="font-semibold text-lg">Greedy</span>
                    </div>
                    <p class="text-gray-500 text-sm">Pelajari algoritma Greedy yang membuat pilihan terbaik pada setiap langkah untuk mencapai solusi optimal.</p>
                </a>
                <a href="{{ route('knapsack') }}" class="block bg-white rounded-xl shadow hover:shadow-lg transition-all duration-500 ease-in-out hover:scale-[1.02] p-6 cursor-pointer animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">📦</span>
                        <span class="font-semibold text-lg">Knapsack</span>
                    </div>
                    <p class="text-gray-500 text-sm">Simulasikan pemilihan item untuk dimasukkan ke dalam 'tas' dengan kapasitas terbatas guna memaksimalkan nilai.</p>
                </a>
                <a href="{{ route('binary-search') }}" class="block bg-white rounded-xl shadow hover:shadow-lg transition-all duration-500 ease-in-out hover:scale-[1.02] p-6 cursor-pointer animate__animated animate__fadeInUp animate__delay-4s">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-2">🔍</span>
                        <span class="font-semibold text-lg">Binary Search</span>
                    </div>
                    <p class="text-gray-500 text-sm">Temukan elemen dalam array terurut secara efisien dengan membagi interval pencarian menjadi dua.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
