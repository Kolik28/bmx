<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - UMKM Store</title>
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

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-md bg-orange-500 text-white font-medium">Home</a>
                    <a href="{{ route('toll') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Salip
                        Antrian</a>
                    <a href="{{ route('toll_dp') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">DP</a>
                    <a href="{{ route('product') }}"
                        class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Produk</a>
                    <a href="{{ route('about') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">About</a>
                    <a href="/signout" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Logout</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2" onclick="toggleMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobileMenu" class="hidden md:hidden py-4 border-t border-gray-200">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-md bg-orange-500 text-white font-medium">Home</a>
                    <a href="{{ route('toll') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Salip
                        Antrian</a>
                    <a href="{{ route('toll_dp') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">DP</a>
                    <a href="{{ route('product') }}"
                        class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Produk</a>
                    <a href="{{ route('about') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">About</a>
                    <a href="/signout" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 gradient-text p-2">
                Selamat Datang di PC Store
            </h1>
            <p class="text-lg text-gray-600 mb-8">
                Layanan profesional dengan kualitas terbaik
            </p>
        </div>

        <!-- Contact Info -->
        <div class="grid md:grid-cols-2 gap-6 mb-12">
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-all">
                <div class="mb-4">
                    <h3 class="text-xl font-bold flex items-center gap-2">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        Informasi Kontak
                    </h3>
                </div>
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Username</p>
                        <p class="text-lg font-semibold">{{ Session::get('auth') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">WhatsApp</p>
                        <a href="https://wa.me/628123456789"
                            class="text-lg font-semibold text-orange-500 hover:text-orange-600" target="_blank">
                            {{ Session::get('user_id') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-all">
                <div class="mb-4">
                    <h3 class="text-xl font-bold flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Status Antrian
                    </h3>
                </div>
                <div class="space-y-2">
                    <div class="text-5xl font-extrabold text-orange-500 text-center py-4 rounded-lg">
                        #05
                    </div>
                </div>
            </div>
        </div>

        <!-- Queue Section -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold mb-4">Antrian Pemesanan</h3>
            <div class="space-y-4">
                <div
                    class="flex items-center justify-between p-4 rounded-lg border border-gray-200 bg-gradient-to-r from-white to-gray-50 hover:shadow-md transition-all">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center font-bold text-orange-500">
                            1
                        </div>
                        <div>
                            <p class="font-semibold">Customer 1</p>
                            <p class="text-sm text-gray-500">Dalam Proses</p>
                        </div>
                    </div>
                    <div class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-600">
                        Proses
                    </div>
                </div>

                <div
                    class="flex items-center justify-between p-4 rounded-lg border border-gray-200 bg-gradient-to-r from-white to-gray-50 hover:shadow-md transition-all">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center font-bold text-orange-500">
                            2
                        </div>
                        <div>
                            <p class="font-semibold">Customer 2</p>
                            <p class="text-sm text-gray-500">Menunggu</p>
                        </div>
                    </div>
                    <div class="px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-600">
                        Menunggu
                    </div>
                </div>

                <div
                    class="flex items-center justify-between p-4 rounded-lg border border-gray-200 bg-gradient-to-r from-white to-gray-50 hover:shadow-md transition-all">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center font-bold text-orange-500">
                            3
                        </div>
                        <div>
                            <p class="font-semibold">Customer 3</p>
                            <p class="text-sm text-gray-500">Menunggu</p>
                        </div>
                    </div>
                    <div class="px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-600">
                        Menunggu
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
    @extends('components.footer')
</body>

</html>
