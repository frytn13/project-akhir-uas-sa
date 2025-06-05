<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Binary Search & Sorting - Divide and Conquer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <p class="mb-6 text-gray-600">
                    Algoritma Binary Search mencari posisi target dalam array terurut dengan membagi ruang pencarian secara berulang. Sebelum melakukan pencarian, array harus diurutkan terlebih dahulu menggunakan algoritma Bubble Sort atau Selection Sort.
                </p>

                <!-- Sorting Form -->
                <form action="{{ url('/binary-search/sort') }}" method="POST" class="space-y-4 mb-8">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Masukkan Array Angka (pisahkan dengan spasi atau koma)</label>
                        <input type="text" name="array" value="{{ old('array', isset($originalArray) ? implode(', ', $originalArray) : '') }}" placeholder="Contoh: 3 6 8 10 atau 3,6,8,10" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        @error('array')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pilih Algoritma Sorting</label>
                        <select name="algorithm" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="bubble" {{ old('algorithm', $algorithm ?? '') == 'bubble' ? 'selected' : '' }}>Bubble Sort</option>
                            <option value="selection" {{ old('algorithm', $algorithm ?? '') == 'selection' ? 'selected' : '' }}>Selection Sort</option>
                        </select>
                        @error('algorithm')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Urutkan Array</button>
                </form>

                <!-- Display Sorted Array and Binary Search Form -->
                @if(isset($sortedArray))
                    <div class="mt-8 p-4 bg-gray-100 rounded-md">
                        <h3 class="text-lg font-semibold mb-2">Hasil Sorting ({{ ucfirst($algorithm) }}):</h3>
                        <p><strong>Array Asli:</strong> {{ implode(', ', $originalArray) }}</p>
                        <p><strong>Array Terurut:</strong> {{ implode(', ', $sortedArray) }}</p>
                    </div>

                    <!-- Binary Search Form -->
                    <form action="{{ url('/binary-search') }}" method="POST" class="space-y-4 mt-6">
                        @csrf
                        <input type="hidden" name="sorted_array" value="{{ implode(',', $sortedArray) }}">
                        <input type="hidden" name="algorithm" value="{{ $algorithm ?? '' }}">
                        <input type="hidden" name="original_array" value="{{ implode(',', $originalArray ?? []) }}">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Target yang Dicari</label>
                            <input type="number" name="target" value="{{ old('target', $target ?? '') }}" placeholder="Contoh: 6" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                            @error('target')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Cari Target</button>
                    </form>
                @endif

                <!-- Hasil Pencarian Binary Search -->
                @if(isset($foundIndex))
                     <div class="mt-8 p-4 bg-gray-100 rounded-md">
                        <h3 class="text-lg font-semibold mb-2">Hasil Pencarian Binary Search</h3>
                        <p><strong>Array yang Digunakan:</strong> {{ implode(', ', $array) }}</p>
                        <p><strong>Target:</strong> {{ $target }}</p>
                        @if ($foundIndex !== -1)
                            <p class="text-green-600 font-semibold mt-2">Ditemukan di index ke-{{ $foundIndex }}.</p>
                        @else
                            <p class="text-red-600 font-semibold mt-2">Tidak ditemukan.</p>
                        @endif

                        <!-- Langkah-langkah Binary Search -->
                        <div class="mt-6">
                            <h4 class="font-medium mb-2">Langkah-langkah Pencarian:</h4>
                            <ul class="list-disc pl-6 text-gray-700">
                                @php
                                    // Simulasi ulang langkah-langkah binary search untuk ditampilkan
                                    $steps = [];
                                    $l = 0;
                                    $r = count($array) - 1;
                                    while ($l <= $r) {
                                        $m = intdiv($l + $r, 2);
                                        $steps[] = "Cek index tengah ke-$m: " . $array[$m];
                                        if ($array[$m] == $target) {
                                            $steps[] = "Target ditemukan di index ke-$m.";
                                            break;
                                        } elseif ($array[$m] < $target) {
                                            $steps[] = "Target lebih besar dari " . $array[$m] . ", geser ke kanan.";
                                            $l = $m + 1;
                                        } else {
                                            $steps[] = "Target lebih kecil dari " . $array[$m] . ", geser ke kiri.";
                                            $r = $m - 1;
                                        }
                                    }
                                    if ($foundIndex === -1) {
                                        $steps[] = "Target tidak ditemukan dalam array.";
                                    }
                                @endphp
                                @foreach($steps as $step)
                                    <li>{{ $step }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Target the array input in the sorting form
            const arrayInput = document.querySelector('form[action="{{ url('/binary-search/sort') }}"] input[name="array"]');

            arrayInput.addEventListener('keydown', function (e) {
                if (e.key === ' ') {
                    e.preventDefault(); // Prevent default space behavior

                    const cursorPosition = this.selectionStart;
                    const currentValue = this.value;

                    // Insert ', ' at the cursor position, handle empty string case
                    const newValue = currentValue.substring(0, cursorPosition) + (currentValue.length > 0 && cursorPosition > 0 && currentValue[cursorPosition - 1] !== ',' && currentValue[cursorPosition - 1] !== ' ' ? ', ' : '') + currentValue.substring(cursorPosition);

                    this.value = newValue.trim(); // Trim to avoid leading/trailing spaces after comma insertion

                    // Set cursor position after the inserted ', ' if a comma was inserted
                    const newCursorPosition = (newValue.length > currentValue.length) ? cursorPosition + 2 : cursorPosition + 1; // +2 if comma inserted, +1 for just space if no comma
                    this.selectionStart = this.selectionEnd = newCursorPosition;
                }
            });

            // Optional: Keep the input formatting on paste or other input methods for the sorting input
            arrayInput.addEventListener('input', function (e) {
                let value = e.target.value;

                // Remove non-digit and non-comma characters, allow spaces temporarily for splitting
                value = value.replace(/[^0-9,\s]/g, ''); // Allow spaces and commas

                // Replace multiple spaces or spaces around commas with a single comma and space
                value = value.replace(/\s*,\s*/g, ', ');
                value = value.replace(/\s+/g, ', '); // Replace one or more spaces with comma space
                value = value.replace(/,+/, ','); // Replace multiple commas with one comma
                value = value.replace(/^,+|,+$/g, ''); // Remove leading/trailing commas

                // Split by comma and trim whitespace, filter out empty strings
                const numbers = value.split(',').map(number => number.trim()).filter(number => number !== '');

                // Join back with comma and space
                e.target.value = numbers.join(', ');
            });

             // Prevent 'e' and '.' in the target input for number type
            const targetInput = document.querySelector('input[name="target"]');
            if(targetInput) {
                 targetInput.addEventListener('keypress', function(e) {
                    if (e.key === 'e' || e.key === '.') {
                         e.preventDefault();
                    }
                 });
            }

        });
    </script>
</x-app-layout>
