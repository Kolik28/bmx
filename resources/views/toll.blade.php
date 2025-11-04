<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salip Antrian - UMKM Store</title>
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
                    <a href="{{ route('toll') }}"
                        class="px-4 py-2 rounded-md bg-orange-500 text-white font-medium">Salip Antrian</a>
                    <a href="{{ route('toll_dp') }}" class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">DP</a>
                    <a href="{{ route('product') }}"
                        class="px-4 py-2 rounded-md hover:bg-gray-100 font-medium">Produk</a>
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
                    <a href="{{ route('toll') }}"
                        class="px-4 py-2 rounded-md bg-orange-500 text-white font-medium">Salip Antrian</a>
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
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-4 gradient-text">
                    Salip Antrian
                </h1>
                <p class="text-gray-600">
                    Lewati antrian dengan membayar biaya tambahan
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="mb-6">
                    <h3 class="text-xl font-bold mb-2">Form Salip Antrian</h3>
                    <p class="text-gray-500">Isi form di bawah ini untuk melanjutkan</p>
                </div>

                <form onsubmit="handleSubmit(event)" class="space-y-6">
                    <div class="space-y-2">
                        <label for="jumlah" class="block text-sm font-medium">
                            Jumlah Menyalip Antrian
                        </label>
                        <input type="number" id="jumlah" min="1" placeholder="Masukkan jumlah antrian"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                            required />
                        <p class="text-sm text-gray-500">
                            Biaya: Rp 100.000 per antrian
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium">
                            Upload Bukti Pembayaran
                        </label>
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-orange-500 transition-colors cursor-pointer">
                            <input type="file" id="bukti" accept="image/*" onchange="displayFileName()"
                                class="hidden" required />
                            <label for="bukti" class="cursor-pointer">
                                <svg class="mx-auto mb-2 text-gray-400" width="40" height="40" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p id="fileName" class="text-sm text-gray-500">
                                    Klik untuk upload foto bukti pembayaran
                                </p>
                            </label>
                        </div>
                    </div>

                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="font-semibold mb-2">Informasi Rekening:</h3>
                        <div class="space-y-1 text-sm">
                            <p>Bank: BCA</p>
                            <p>No. Rekening: 1234567890</p>
                            <p>Atas Nama: UMKM Store</p>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-orange-500 text-white font-semibold py-3 rounded-md hover:bg-orange-600 transition-colors shadow-md hover:shadow-lg">
                        Kirim Permintaan
                    </button>
                </form>
            </div>
        </div>
    </main>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function displayFileName() {
            const input = document.getElementById('bukti');
            const fileName = document.getElementById('fileName');
            if (input.files && input.files[0]) {
                fileName.textContent = input.files[0].name;
            }
        }

        function handleSubmit(event) {
            event.preventDefault();
            alert('Permintaan salip antrian telah dikirim!');
            event.target.reset();
            document.getElementById('fileName').textContent = 'Klik untuk upload foto bukti pembayaran';
        }
    </script>
    @extends('components.footer')
</body>

</html>
