<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

<body>

    <section id="detail-produk">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="text-xl gradient-text hover:text-orange-800 font-bold flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Images -->
                <div>
                    <div class="bg-gray-100 rounded-lg h-80 md:h-150 flex items-center justify-center mb-4">
                        <img id="detail-product-image" src="{{ asset('storage/produk/' . $items['img']) }}" alt="Product Image"
                            class="h-full w-full rounded-lg object-cover">
                    </div>
                </div>

                <!-- Product Details -->
                <div>
                    <h1 id="detail-product-name" class="text-3xl font-bold text-gray-800 mb-2">{{ $items['nama'] }}</h1>

                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-blue-600 mb-2" id="detail-product-price">shjvjs</h2>
                        <p class="text-gray-600" id="detail-product-description"></p>
                    </div>

                    <div class="mb-6">
                        <label for="detail-product-quantity" class="block text-gray-700 font-medium mb-2">Ukuran</label>
                        <input type="number" class="w-20 border border-gray-300 rounded-lg px-3 py-2"
                            id="detail-product-quantity" value="100" min="100">
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Varian</h3>
                        <div id="detail-product-variants" class="flex flex-wrap gap-2">
                            <button
                                class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
                                Airbrush Aja
                            </button>
                            <button
                                class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
                                Tambahahan Kain
                            </button>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="detail-product-quantity" class="block text-gray-700 font-medium mb-2">Total Harga</label>
                        <h4 class="text-red-500 font-bold">Rp. 10000</h4>
                    </div>

                    <div class="flex space-x-4">
                        <button
                            class="flex-1 bg-green-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-green-700 transition duration-300 flex items-center justify-center">
                            <i class="fas fa-bolt mr-2"></i> Pesan Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Reviews -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Ulasan Pembeli</h2>
                <div class="space-y-6">
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex justify-between mb-2">
                            <h3 class="font-semibold text-gray-800">Ahmad S.</h3>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-2">Produknya bagus banget, kualitas sesuai harga. Pengiriman juga
                            cepat.</p>
                        <p class="text-sm text-gray-500">2 hari yang lalu</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
       @extends('components.footer')
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hanya jalankan logika ini jika tipe produk adalah 'airbrush'
        const inputQty = document.getElementById('jumlah_salip');
        const outputHarga = document.getElementById('harga_output');

        if (!inputQty || !outputHarga) {
            return;
        }

        // Ambil nilai harga dari Blade (PHP) dan masukkan ke variabel JS
        const AIRBRUSH_FEE = {{ $airbrush_fee ?? 0 }};

        /**
         * Mengubah angka menjadi format Rupiah Indonesia.
         * @param {number} angka
         * @returns {string}
         */
        const formatRupiah = (angka) => {
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });
            return formatter.format(angka);
        };

        /**
         * Menghitung total harga berdasarkan kuantitas input dan memperbarui tampilan.
         */
        window.hitungPenjumlahanAirbrush = () => {
            // Ambil nilai kuantitas, konversi ke integer, default ke 1 jika tidak valid
            let jumlah = parseInt(inputQty.value) || 1;

            // Pastikan nilai minimal 1
            if (jumlah < 1) {
                jumlah = 1;
                inputQty.value = 1;
            }

            // Perhitungan: Total = Harga Dasar + (Jumlah * Biaya Airbrush per unit)
            const totalHarga = (jumlah * 1000) + AIRBRUSH_FEE;

            // Update tampilan dengan format Rupiah
            outputHarga.textContent = formatRupiah(totalHarga);
        };

        // Pasang event listener pada perubahan input
        inputQty.addEventListener('input', window.hitungPenjumlahanAirbrush);

        // Jalankan sekali saat DOM dimuat untuk memastikan harga awal sudah terformat
        window.hitungPenjumlahanAirbrush();
    });
</script>

</html>
