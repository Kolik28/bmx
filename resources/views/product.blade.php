<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - UMKM Store</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .gradient-text {
            background: linear-gradient(to right, hsl(16, 90%, 58%), hsl(210, 100%, 50%));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-gray-200 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="text-2xl font-bold gradient-text">PC Store</a>

                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Home</a>
                    <a href="{{ route('toll') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Salip
                        Antrian</a>
                    <a href="{{ route('toll_dp') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">DP</a>
                    <a href="{{ route('product') }}" class="px-4 py-2 rounded-md bg-orange-500 text-white font-medium">Produk</a>
                    <a href="{{ route('about') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">About</a>
                    <a href="/signout" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Logout</a>
                </div>

                <button class="md:hidden p-2" onclick="toggleMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <div id="mobileMenu" class="hidden md:hidden py-4 border-t border-gray-200">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Home</a>
                    <a href="{{ route('toll') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Salip
                        Antrian</a>
                    <a href="{{ route('toll_dp') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">DP</a>
                    <a href="{{ route('product') }}" class="px-4 py-2 rounded-md bg-orange-500 text-white font-medium">Produk</a>
                    <a href="{{ route('about') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">About</a>
                    <a href="/signout" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 gradient-text p-2">
                Produk Kami
            </h1>
            <p class="text-lg text-gray-600">
                Pilihan produk terbaik untuk Anda
            </p>
        </div>

        <!-- Airbrush Section -->
        <section class="mb-16">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                <div class="h-1 w-5 bg-gradient-to-r from-orange-500 to-blue-500 rounded"></div>
                Airbrush
            </h2>
            <div class="grid md:grid-cols-3 gap-6">

                @foreach ($item['airbrush'] as $it)
                    <a href="{{ route('product.detail', $it['id']) }}">
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
                            <div
                                class="bg-gradient-to-br from-orange-100 to-blue-100 flex items-center justify-center group-hover:scale-105 transition-transform">

                                <img class="h-70 w-full object-cover md:h-60 rounded-t-xl"
                                    src="{{ asset('storage/produk/' . $it['img']) }}" alt="Sampul Produk Premium">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $it['nama'] }}</h3>
                                <p class="text-gray-600 mb-4">Desain airbrush dasar</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </section>

        <!-- Bantang Section -->
        <section class="mb-16">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                <div class="h-1 w-5 bg-gradient-to-r from-orange-500 to-blue-500 rounded"></div>
                Bantang
            </h2>
            <div class="grid md:grid-cols-3 gap-6">

                @foreach ($item['polosan'] as $it)
                    <a href="{{ route('product.detail', $it['id']) }}">
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
                            <div
                                class="bg-gradient-to-br from-orange-100 to-blue-100 flex items-center justify-center group-hover:scale-105 transition-transform">

                                <img class="h-70 w-full object-cover md:h-60 rounded-t-xl"
                                    src="{{ asset('storage/produk/' . $it['img']) }}" alt="Sampul Produk Premium">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $it['nama'] }}</h3>
                                <p class="text-gray-600 mb-4">Desain airbrush dasar</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </section>

        <!-- Fullset Section -->
        <section class="mb-16">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                <div class="h-1 w-5 bg-gradient-to-r from-orange-500 to-blue-500 rounded"></div>
                Fullset
            </h2>
            <div class="grid md:grid-cols-3 gap-6">

                @foreach ($item['fullset'] as $it)
                    <a href="{{ route('product.detail', $it['id']) }}">
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
                            <div
                                class="bg-gradient-to-br from-orange-100 to-blue-100 flex items-center justify-center group-hover:scale-105 transition-transform">

                                <img class="h-70 w-full object-cover md:h-60 rounded-t-xl"
                                    src="{{ asset('storage/produk/' . $it['img']) }}" alt="Sampul Produk Premium">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $it['nama'] }}</h3>
                                <p class="text-gray-600 mb-4">Desain airbrush dasar</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </section>
    </main>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function handleOrder(productName) {
            alert(productName + ' berhasil ditambahkan ke keranjang!');
        }
    </script>
    @extends('components.footer')
</body>

</html>
