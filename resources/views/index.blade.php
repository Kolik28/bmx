<html lang="en" class="h-full bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

< class="bg-gray-50">

     <main class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold mb-4 gradient-text p-3">
                    Selamat Datang Silahkan Sign-in atau Register
                </h1>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">

                @if ($errors->any())
                <div class='bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded' role='alert'>
                    <p class='font-bold'>Gagal Menyimpan Data</p>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

                <form action="{{ route('store') }}" method="post" class="space-y-6">
                    @csrf
                    <div class="mb-5">
                        <label for="nama" class="block text-sm font-medium mb-2">
                            Nama
                        </label>
                        <input value="{{ old('nama') }}" type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap"
                            class="w-full pl-5 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                            required />
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium mb-2">
                            Password
                        </label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password"
                            class="w-full pl-5 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                            required />
                    </div>

                    <div class="mb-5">
                        <label for="nomor-whatsapp" class="block text-sm font-medium mb-2">
                            Nomor WhatsApp
                        </label>
                        <input value="{{ old('nowa') }}" type="number" name="nowa" id="nomor-whatsapp" placeholder="Masukkan Nomor WhatsApp"
                            class="w-full pl-5 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                            required />
                    </div>

                    <button type="submit" name="btn"
                        class="w-full bg-orange-500 text-white font-semibold py-3 rounded-md hover:bg-orange-600 transition-colors shadow-md hover:shadow-lg">
                        Next
                    </button>
                </form>
            </div>
        </div>
    </main>
@extends('components.footer')
</body>

</html>
