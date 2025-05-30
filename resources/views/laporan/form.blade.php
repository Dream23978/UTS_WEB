<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Halaman Laporan</title>

    <!-- Google Fonts: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

</head>

<body class="bg-gradient-to-b from-gray-100 to-gray-200 text-gray-800">


<!-- Navbar -->
    <nav class="fixed top-0 w-full backdrop-blur bg-white/80 shadow-sm z-50">
  <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
    <h1 class="text-xl font-extrabold tracking-wider text-slate-900">SPELL</h1>

    <!-- Menu dibungkus agar bisa diatur posisinya -->
    <div class="flex-1 flex justify-center">
      <ul class="flex gap-6 text-sm md:text-base font-medium">
        <li><a href="{{ route('index') }}" class="hover:text-indigo-600 transition">Home</a></li>
        <li><a href="/laporan" class="hover:text-indigo-600 transition">Laporan</a></li>
        <li><a href="/cekstatus" class="hover:text-indigo-600 transition">Riwayat</a></li>
      </ul>
    </div>

    <!-- Tanggal di kanan -->
    <div class="hidden md:block ml-4 text-sm text-slate-700">
      {{ date('Y M d | H:i') }}
    </div>
  </div>
</nav>


    <!-- Konten utama -->
    <main class="flex-grow mt-28 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">

<!-- Panel Kiri -->
<div class="bg-white bg-opacity-90 rounded-lg p-6 sm:p-8 shadow-lg animate-fadeinb">
    <h2 class="text-xl sm:text-2xl font-bold mb-4 text-gray-800">Deskripsi Formulir Laporan</h2>
    <p class="text-gray-700 mb-4" style="text-align: justify;">
        Form ini memungkinkan pengguna untuk mengirim laporan kejadian lalu lintas seperti kecelakaan, pelanggaran, atau kondisi jalan yang membahayakan. Elemen-elemen penting yang disediakan dalam form ini:
    </p>

    <h3 class="text-lg font-semibold text-gray-800 mb-2">Upload Foto Kejadian</h3>
    <p class="text-gray-700 mb-4" style="text-align: justify;">
        Pengguna dapat mengunggah bukti visual berupa gambar (misalnya kecelakaan atau rambu rusak).
    </p>

    <h3 class="text-lg font-semibold text-gray-800 mb-2">Input Lokasi Kejadian</h3>
    <p class="text-gray-700 mb-4" style="text-align: justify;">
        Lokasi kejadian dilaporkan secara manual agar laporan bisa dipetakan atau ditindaklanjuti oleh pihak terkait.
    </p>

    <h3 class="text-lg font-semibold text-gray-800 mb-2">Tanggal Kejadian</h3>
    <p class="text-gray-700 mb-4" style="text-align: justify;">
        Tanggal peristiwa dicatat untuk keperluan dokumentasi dan analisis kronologis.
    </p>
</div>

            <!-- Form Laporan -->
            <div class="bg-white bg-opacity-90 rounded-lg p-6 sm:p-8 shadow-lg animate-fadeinb">
                <h1 class="text-xl sm:text-2xl font-bold mb-6 text-center text-gray-800">Form Buat Laporan</h1>

                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-3 rounded mb-4 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-5">
                    @csrf

                    <div>
                        <label for="foto" class="block mb-2 font-semibold text-gray-700">Upload Foto</label>
                        <input type="file" name="foto" id="foto" accept="image/*" required
                            class="block w-full text-gray-700 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="lokasi" class="block mb-2 font-semibold text-gray-700">Lokasi Kejadian</label>
                        <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" required
                            class="block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="tanggal_kejadian" class="block mb-2 font-semibold text-gray-700">Tanggal
                            Kejadian</label>
                        <input type="date" name="tanggal_kejadian" id="tanggal_kejadian"
                            value="{{ old('tanggal_kejadian') }}" required
                            class="block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-br from-[#2C3E50] to-[#34495E] text-white font-semibold py-2 rounded transition duration-300" onclick="showCustomImageSwal1()">Kirim
                        Laporan</button>
                </form>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 text-gray-700 text-sm">
        &copy; 2025 Sistem Pelaporan dan Edukasi Lalu Lintas
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    window.showCustomImageSwal1 = function () {
        Swal.fire({
  title: "Laporan Terkirim!",
  icon: "success",
  draggable: true });}
    </script>
</body>

</html>
