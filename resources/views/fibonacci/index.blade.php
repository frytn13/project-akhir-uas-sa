<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fibonacci Rekursif') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4">Implementasi Fibonacci Rekursif</h3>
                        <p class="text-gray-600 mb-4">
                            Masukkan angka untuk menghitung deret Fibonacci secara rekursif.
                            Angka yang dimasukkan harus antara 0-20 untuk menghindari beban komputasi yang terlalu berat.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('fibonacci.calculate') }}" class="mb-8">
                        @csrf
                        <div class="mb-4">
                            <label for="number" class="block text-sm font-medium text-gray-700">Masukkan Angka (0-20)</label>
                            <input type="number" name="number" id="number"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   value="{{ old('number', $number ?? '') }}" min="0" max="20" required>
                            @error('number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Hitung Fibonacci
                        </button>
                    </form>

                    @if(isset($result))
                        <div class="mt-8">
                            <h4 class="text-lg font-semibold mb-2">Hasil Perhitungan</h4>
                            <p class="mb-2">Fibonacci ke-{{ $number }} adalah: <span class="font-bold">{{ $result }}</span></p>

                            <h4 class="text-lg font-semibold mt-4 mb-2">Deret Fibonacci:</h4>
                            <div class="bg-gray-100 p-4 rounded">
                                {{ implode(', ', $sequence) }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
