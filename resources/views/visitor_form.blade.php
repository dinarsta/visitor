<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Visitor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+2mAp0xZ0/L9iOBfvoP+ntE+Y+u13X3Db98D4K" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="bg-gray-900 text-white">

    <!-- Header -->
    <header class="bg-gray-800 p-6 flex justify-center items-center">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-auto h-20"> <!-- Adjust logo size as needed -->
    </header>

    <!-- Main Content -->
    <div class="w-full max-w-5xl mx-auto bg-gray-800 rounded-lg shadow-lg flex flex-col md:flex-row my-8">

        <!-- Left side with image -->
        <div class="hidden md:flex md:w-1/2 items-center justify-center bg-gray-700 rounded-l-lg p-6">
            <img src="{{ asset('p.png') }}" alt="Promo Image" class="w-auto h-40"> <!-- Adjust image size as needed -->
        </div>

        <!-- Right side with form -->
        <div class="md:w-1/2 w-full p-8">
            <h2 class="text-4xl font-semibold mb-6 text-center text-grey-400">PT PRIMANUSA MUKTI UTAMA</h2>
            <p class="text-center text-gray-400 mb-8">Silakan isi data Anda untuk membantu kami memberikan layanan yang lebih baik.</p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
            <form action="/visitor/form/submit" method="POST">
                @csrf

                <!-- Name field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-400 mb-1">Nama:</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                </div>

                <!-- Phone field -->
                <div class="mb-4">
                    <label for="phone" class="block text-gray-400 mb-1">Nomor Whatsapp:</label>
                    <input type="number" id="phone" name="phone" required class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                </div>

                <!-- Institution field -->
                <div class="mb-6">
                    <label for="instansi" class="block text-gray-400 mb-1">Instansi:</label>
                    <input type="text" id="instansi" name="instansi" required class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                </div>

                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="w-full bg-gray-700 hover:bg-gray-600 text-white py-3 rounded-lg transition duration-900">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6">
        <div class="container mx-auto text-center">
            <p class="text-gray-400 mb-4">© 2024 PT PRIMANUSA MUKTI UTAMA. Semua hak dilindungi.</p>
            <p class="text-gray-400">Ikuti kami di:</p>
            <div class="flex justify-center space-x-4 mt-2">
                <a href="https://www.instagram.com/primanusamuktiutama/profilecard/?igsh=MWViZHBxbzBtZ2NzcQ==" class="text-gray-400 hover:text-purple-400 transition duration-300" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="https://youtube.com/@pmu2006?si=xHMSDrc2mPm2dGcM" class="text-gray-400 hover:text-purple-400 transition duration-300" target="_blank"><i class="bi bi-youtube"></i></a>
                <a href="https://www.linkedin.com/company/pt-primanusa-mukti-utama/" class="text-gray-400 hover:text-purple-400 transition duration-300" target="_blank"><i class="bi bi-linkedin"></i></a>
                <a href="https://wa.link/u3a77i" class="text-gray-400 hover:text-purple-400 transition duration-300" target="_blank"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>
