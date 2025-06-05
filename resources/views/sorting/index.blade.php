<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Algoritma Sorting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Deskripsi -->
                    <div class="mb-6">
                        <p class="text-gray-600">
                            Algoritma sorting adalah metode untuk mengurutkan elemen-elemen dalam array.
                            Pilih algoritma sorting yang ingin Anda gunakan dan masukkan array angka yang akan diurutkan.
                        </p>
                    </div>

                    <!-- Form Input -->
                    <form method="POST" action="{{ route('sorting') }}" class="space-y-4">
                        @csrf

                        <!-- Input Array -->
                        <div>
                            <label for="array" class="block text-sm font-medium text-gray-700">Masukkan array (pisahkan dengan koma)</label>
                            <input type="text" name="array" id="array"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Contoh: 5,2,8,1,9"
                                value="{{ old('array') }}"
                                required>
                            @error('array')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pilihan Algoritma -->
                        <div>
                            <label for="algorithm" class="block text-sm font-medium text-gray-700">Pilih Algoritma Sorting</label>
                            <select name="algorithm" id="algorithm"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                                <option value="">Pilih algoritma...</option>
                                <option value="bubble" {{ old('algorithm') == 'bubble' ? 'selected' : '' }}>Bubble Sort</option>
                                <option value="selection" {{ old('algorithm') == 'selection' ? 'selected' : '' }}>Selection Sort</option>
                            </select>
                            @error('algorithm')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Urutkan
                            </button>
                        </div>
                    </form>

                    <!-- Hasil Sorting -->
                    @if(isset($result))
                        <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Hasil Sorting</h3>

                            <div class="space-y-4">
                                <!-- Array Sebelum Sorting -->
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Array Sebelum Sorting:</p>
                                    <p class="mt-1 text-gray-900">{{ implode(', ', $result['original']) }}</p>
                                </div>

                                <!-- Array Sesudah Sorting -->
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Array Sesudah Sorting:</p>
                                    <p class="mt-1 text-gray-900">{{ implode(', ', $result['sorted']) }}</p>
                                </div>

                                <!-- Jenis Algoritma -->
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Algoritma yang Digunakan:</p>
                                    <p class="mt-1 text-gray-900">{{ ucfirst($result['algorithm']) }} Sort</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
