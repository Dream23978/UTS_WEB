<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat Pelanggaran Lalu Lintas</title>
  <script src="https://cdn.tailwindcss.com"></script>
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

  <!-- Container -->
  <div class="max-w-2xl mx-auto mt-32 px-4 space-y-6 ">

    <!-- Judul -->
    <div class="text-center shadow-xl bg-blue-900 rounded-lg py-2">
      <h2 class="text-xl font-bold text-white">Riwayat Laporan</h2>
    </div>

    <!-- Laporan 1 -->
    <div class="bg-white border rounded-lg shadow-xl">
      <div onclick="toggleNotif(this)" class="flex justify-between items-center p-4 cursor-pointer">
        <span class="font-semibold text-gray-800">Pelanggaran 1: Melanggar Lampu Merah</span>
        <svg class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
      </div>
      <div class="notif hidden p-4 border-t text-sm bg-gray-50 text-gray-700">
        <strong>Status:</strong> Ditindak<br>
        <strong>Tanggal Kejadian:</strong> 20 Mei 2025<br>
        <strong>Lokasi:</strong> Simpang Empat Jalan Merdeka<br>
        <strong>Keterangan:</strong> Pengemudi menerobos saat lampu masih merah.
      </div>
    </div>

    <!-- Laporan 2 -->
    <div class="bg-white border rounded-lg shadow-xl">
      <div onclick="toggleNotif(this)" class="flex justify-between items-center p-4 cursor-pointer">
        <span class="font-semibold text-gray-800">Pelanggaran 2: Tidak Menggunakan Helm</span>
        <svg class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
      </div>
      <div class="notif hidden p-4 border-t text-sm bg-gray-50 text-gray-700">
        <strong>Status:</strong> Dalam Proses<br>
        <strong>Tanggal Kejadian:</strong> 18 Mei 2025<br>
        <strong>Lokasi:</strong> Jalan Diponegoro<br>
        <strong>Keterangan:</strong> Pengendara motor tertangkap CCTV tanpa helm.
      </div>
    </div>

    <!-- Laporan 3 -->
    <div class="bg-white border rounded-lg shadow-xl">
      <div onclick="toggleNotif(this)" class="flex justify-between items-center p-4 cursor-pointer">
        <span class="font-semibold text-gray-800">Pelanggaran 3: Parkir Sembarangan</span>
        <svg class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
      </div>
      <div class="notif hidden p-4 border-t text-sm bg-gray-50 text-gray-700">
        <strong>Status:</strong> Sudah Ditangani<br>
        <strong>Tanggal Kejadian:</strong> 15 Mei 2025<br>
        <strong>Lokasi:</strong> Jalan Ahmad Yani<br>
        <strong>Keterangan:</strong> Mobil diparkir di trotoar dan mengganggu pejalan kaki.
      </div>
    </div>

  </div>

  <!-- Toggle Script -->
  <script>
    function toggleNotif(el) {
      const notif = el.nextElementSibling;
      notif.classList.toggle('hidden');
      const arrow = el.querySelector('svg');
      arrow.classList.toggle('rotate-90');
    }
  </script>

  <!-- Footer -->
  <footer class="text-center text-sm font-medium text-gray-600 mt-24 mb-6">

      &copy; SPELL.2025
    </footer>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
