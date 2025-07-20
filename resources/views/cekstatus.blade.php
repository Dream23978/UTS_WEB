<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat Laporan Pelanggaran - SPELL</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow fixed w-full z-50 top-0 left-0">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-indigo-700">SPELL</h1>
      <ul class="flex gap-6 text-sm md:text-base font-medium">
        <li><a href="#" class="hover:text-indigo-600 transition">Home</a></li>
        <li><a href="#" class="text-indigo-700 font-semibold">Laporan</a></li>
        <li><a href="#" class="hover:text-indigo-600 transition">Riwayat</a></li>
      </ul>
      <span class="text-sm text-gray-500 hidden md:block">
        {{ now()->format('d M Y | H:i') }}
      </span>
    </div>
  </nav>

  <!-- Main -->
  <main class="pt-28 pb-16 px-4 max-w-3xl mx-auto space-y-6">

    <!-- Judul -->
    <div class="text-center bg-indigo-700 text-white py-4 rounded-lg shadow-lg">
      <h2 class="text-2xl font-semibold">Riwayat Laporan Pelanggaran</h2>
      <p class="text-sm mt-1">Berikut adalah data pelanggaran yang pernah Anda laporkan.</p>
    </div>

    <!-- Penjelasan Status -->
    <div class="bg-white border-l-4 border-indigo-600 p-4 rounded shadow">
      <h3 class="font-semibold text-indigo-700 mb-2">Penjelasan Status Laporan:</h3>
      <ul class="text-sm text-gray-700 space-y-1 list-disc list-inside">
        <li><span class="font-bold text-red-600">Dalam Proses:</span> Laporan sedang ditinjau oleh petugas dan menunggu verifikasi.</li>
        <li><span class="font-bold text-blue-600">Ditindak:</span> Laporan telah diproses dan pelanggar sudah diberikan tindakan.</li>
        <li><span class="font-bold text-green-600">Sudah Ditangani:</span> Penanganan laporan telah selesai oleh pihak berwenang.</li>
      </ul>
    </div>

    <!-- Data Pelanggaran -->
    @php
      $data = [
        [
          'judul' => 'Melanggar Lampu Merah', 'status' => 'Ditindak',
          'tanggal' => '20 Mei 2025', 'lokasi' => 'Simpang Empat Jalan Merdeka',
          'keterangan' => 'Pengemudi menerobos saat lampu masih merah.',
          'foto' => 'https://source.unsplash.com/400x200/?traffic,redlight'
        ],
        [
          'judul' => 'Tidak Menggunakan Helm', 'status' => 'Dalam Proses',
          'tanggal' => '18 Mei 2025', 'lokasi' => 'Jalan Diponegoro',
          'keterangan' => 'Pengendara motor tertangkap CCTV tanpa helm.',
          'foto' => 'https://source.unsplash.com/400x200/?motorcycle,helmet'
        ],
        [
          'judul' => 'Parkir Sembarangan', 'status' => 'Sudah Ditangani',
          'tanggal' => '15 Mei 2025', 'lokasi' => 'Jalan Ahmad Yani',
          'keterangan' => 'Mobil diparkir di trotoar dan mengganggu pejalan kaki.',
          'foto' => 'https://source.unsplash.com/400x200/?car,parking'
        ]
      ];

      function warnaStatus($status) {
        return match($status) {
          'Dalam Proses' => 'text-red-600',
          'Ditindak' => 'text-blue-600',
          'Sudah Ditangani' => 'text-green-600',
          default => 'text-gray-600'
        };
      }
    @endphp

    @foreach ($data as $index => $item)
      <div class="bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition">
        <button onclick="toggle(this)" class="w-full flex justify-between items-center p-4 text-left">
          <span class="font-medium text-gray-800">🚨 Pelanggaran {{ $index + 1 }}: {{ $item['judul'] }}</span>
          <svg class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </button>
        <div class="detail hidden px-4 pb-4 text-sm text-gray-700 border-t bg-gray-50 space-y-2">
          <p><strong>Status:</strong> <span class="{{ warnaStatus($item['status']) }}">{{ $item['status'] }}</span></p>
          <p><strong>Tanggal Kejadian:</strong> {{ $item['tanggal'] }}</p>
          <p><strong>Lokasi:</strong> {{ $item['lokasi'] }}</p>
          <p><strong>Keterangan:</strong> {{ $item['keterangan'] }}</p>
          <p><strong>Foto Pelanggaran:</strong></p>
          <img src="{{ $item['foto'] }}" alt="Foto pelanggaran" class="w-full h-auto rounded-md border border-gray-300 shadow-sm">
          <div class="pt-2">
            <button onclick="window.print()" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm px-4 py-2 rounded shadow">
              🖨️ Cetak Laporan
            </button>
          </div>
        </div>
      </div>
    @endforeach

  </main>

  <!-- Footer -->
  <footer class="text-center text-sm text-gray-500 mt-6 mb-8">
    &copy; 2025 SPELL. Semua hak dilindungi.
  </footer>

  <!-- Script Toggle -->
  <script>
    function toggle(el) {
      const detail = el.nextElementSibling;
      const icon = el.querySelector('svg');
      detail.classList.toggle('hidden');
      icon.classList.toggle('rotate-90');
    }
  </script>

</body>
</html>
