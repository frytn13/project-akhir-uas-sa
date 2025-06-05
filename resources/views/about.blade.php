<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <!-- Hero Section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl shadow-xl p-8 animate__animated animate__fadeIn">
                <h1 class="text-4xl font-bold text-white text-center mb-4 animate__animated animate__fadeInDown">
                    Tentang Kami – Strategi Algoritma
                </h1>
                <p class="text-xl text-white/90 text-center animate__animated animate__fadeInUp">
                    Kami adalah tim kecil yang bersemangat membangun platform belajar algoritma interaktif.
                </p>
            </div>

            <!-- Team Section -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Anggota 1: Yulianus Febry. T.N -->
                <div class="bg-white/80 backdrop-blur rounded-2xl shadow-xl p-6 transform hover:scale-105 transition-all duration-300 animate__animated animate__zoomIn">
                    <div class="flex justify-center mb-4">
                        <img src="/images/febry.jpg"
                             alt="Yulianus Febry. T.N"
                             class="w-32 h-32 rounded-full shadow-lg object-cover object-center">
                    </div>
                    <h3 class="text-xl font-bold text-center mb-2">Yulianus Febry. T.N</h3>
                    <p class="text-gray-600 text-center mb-4">2313002</p>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">🎯</span>
                            <span>Problem Solver</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">📊</span>
                            <span>Data Analysis</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">🎨</span>
                            <span>UI/UX Design</span>
                        </div>
                    </div>
                </div>
                <!-- Anggota 2: Marselinus Dewadaru. B. A -->
                <div class="bg-white/80 backdrop-blur rounded-2xl shadow-xl p-6 transform hover:scale-105 transition-all duration-300 animate__animated animate__zoomIn" style="animation-delay: 0.2s">
                    <div class="flex justify-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Marselinus+Dewadaru.+B.+A&background=7C3AED&color=fff"
                             alt="Marselinus Dewadaru. B. A"
                             class="w-32 h-32 rounded-full shadow-lg">
                    </div>
                    <h3 class="text-xl font-bold text-center mb-2">Marselinus Dewadaru. B. A</h3>
                    <p class="text-gray-600 text-center mb-4">2313012</p>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">☕</span>
                            <span>Ngoding sambil ngopi</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">🎨</span>
                            <span>Eksperimen desain UI</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">📚</span>
                            <span>Belajar algoritma</span>
                        </div>
                    </div>
                </div>
                <!-- Anggota 3: Delon Setiawan -->
                <div class="bg-white/80 backdrop-blur rounded-2xl shadow-xl p-6 transform hover:scale-105 transition-all duration-300 animate__animated animate__zoomIn" style="animation-delay: 0.4s">
                    <div class="flex justify-center mb-4">
                        <img src="/images/delon.png"
                             alt="Delon Setiawan"
                             class="w-32 h-32 rounded-full shadow-lg object-cover object-center">
                    </div>
                    <h3 class="text-xl font-bold text-center mb-2">Delon Setiawan</h3>
                    <p class="text-gray-600 text-center mb-4">2313018</p>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">🎯</span>
                            <span>Problem Solver</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">📊</span>
                            <span>Data Analysis</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">🎨</span>
                            <span>UI/UX Design</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quote Section -->
            <div class="mt-12 bg-white/80 backdrop-blur rounded-2xl shadow-xl p-8 animate__animated animate__pulse">
                <div class="flex items-center">
                    <div class="w-1 h-24 bg-gradient-to-b from-blue-500 to-purple-600 rounded-full mr-6"></div>
                    <div>
                        <svg class="w-8 h-8 text-gray-400 mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                        <p class="text-xl text-gray-700 italic">
                            "Belajar algoritma itu bukan tentang menghafal kode, tapi tentang memahami logika di baliknya."
                        </p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-12 text-center text-gray-600 text-sm">
                <p>© 2025 Strategi Algoritma – Dibuat dengan ❤️ oleh Tim 3 Orang Hebat</p>
            </div>
        </div>
    </div>
</x-app-layout>
