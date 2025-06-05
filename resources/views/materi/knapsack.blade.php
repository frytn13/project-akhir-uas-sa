<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Knapsack Problem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4">Implementasi Knapsack Problem</h3>
                        <p class="text-gray-600 mb-4">
                            Masukkan kapasitas maksimal tas untuk menghitung kombinasi barang terbaik.
                            Sistem akan memilih barang berdasarkan rasio nilai terhadap berat (value-to-weight ratio).
                        </p>
                    </div>

                    <form method="POST" action="{{ route('knapsack.solve') }}" class="mb-8">
                        @csrf
                        <div class="mb-4">
                            <label for="max_weight" class="block text-sm font-medium text-gray-700">Kapasitas Maksimal Tas (kg)</label>
                            <input type="number" name="max_weight" id="max_weight"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   value="{{ old('max_weight', $maxWeight ?? '') }}" min="1" max="100" required>
                            @error('max_weight')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                            Hitung Kombinasi Terbaik
                        </button>
                    </form>

                    <div class="mb-8">
                        <h4 class="text-lg font-semibold mb-4">Daftar Produk Tersedia</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat (kg)</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai (Rp)</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rasio Nilai/Berat</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($products as $product)
                                        <tr class="{{ isset($selectedProducts) && in_array($product->id, collect($selectedProducts)->pluck('id')->toArray()) ? 'bg-green-50' : '' }}">
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $product->weight }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($product->value, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ number_format($product->value_weight_ratio, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if(isset($selectedProducts))
                        <div id="result" class="mt-8">
                            <h4 class="text-lg font-semibold mb-4">Hasil Perhitungan</h4>

                            <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                                <p class="text-gray-600">Kapasitas Maksimal: {{ $maxWeight }} kg</p>
                                <p class="text-gray-600">Total Berat: {{ $totalWeight }} kg</p>
                                <p class="text-gray-600">Total Nilai: Rp {{ number_format($totalValue, 0, ',', '.') }}</p>
                            </div>

                            <h5 class="font-semibold mb-2">Produk Terpilih:</h5>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat (kg)</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($selectedProducts as $product)
                                            <tr class="bg-green-50">
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->weight }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($product->value, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <script>
                            // Scroll ke hasil setelah submit
                            document.getElementById('result').scrollIntoView({ behavior: 'smooth' });
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
