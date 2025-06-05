<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Algoritma Coin Change (Greedy)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Deskripsi -->
                    <div class="mb-6">
                        <p class="text-gray-600">
                            Algoritma ini memilih koin dari yang terbesar agar mencapai nilai target secara optimal.
                            Masukkan nilai target dan daftar koin yang tersedia untuk melihat kombinasi koin yang dibutuhkan.
                        </p>
                    </div>

                    <!-- Form Input -->
                    <form method="POST" action="{{ route('greedy') }}" class="space-y-4">
                        @csrf

                        <!-- Input Target -->
                        <div>
                            <label for="target" class="block text-sm font-medium text-gray-700">Nilai Target</label>
                            <input type="number" name="target" id="target"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Contoh: 63"
                                value="{{ old('target') }}"
                                required>
                            @error('target')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Input Daftar Koin -->
                        <div>
                            <label for="coins" class="block text-sm font-medium text-gray-700">Daftar Koin (pisahkan dengan koma)</label>
                            <input type="text" name="coins" id="coins"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Contoh: 1,5,10,25"
                                value="{{ old('coins') }}"
                                required>
                            @error('coins')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Hitung Koin
                            </button>
                        </div>
                    </form>

                    <!-- Hasil Perhitungan -->
                    @if(isset($result))
                        <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Hasil Perhitungan</h3>

                            <div class="space-y-4">
                                <!-- Nilai Target -->
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Nilai Target:</p>
                                    <p class="mt-1 text-gray-900">{{ $result['target'] }}</p>
                                </div>

                                <!-- Daftar Koin Tersedia -->
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Daftar Koin Tersedia:</p>
                                    <p class="mt-1 text-gray-900">{{ implode(', ', $result['available_coins']) }}</p>
                                </div>

                                <!-- Kombinasi Koin -->
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Kombinasi Koin yang Digunakan:</p>
                                    <div class="mt-2 space-y-2">
                                        @foreach($result['coin_combinations'] as $coin => $count)
                                            <div class="flex items-center space-x-2">
                                                <span class="text-gray-600">{{ $count }}x</span>
                                                <span class="text-gray-900">koin {{ $coin }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Total Koin -->
                                <div class="pt-4 border-t border-gray-200">
                                    <p class="text-sm font-medium text-gray-700">Total Koin Digunakan:</p>
                                    <p class="mt-1 text-lg font-semibold text-indigo-600">{{ $result['total_coins'] }} koin</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
