<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Sistem Pelaporan dan Edukasi Lalu Lintas</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

  <!-- Navbar -->
  <nav class="fixed top-0 w-full backdrop-blur bg-white/80 shadow-sm z-50">
    <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
      <h1 class="text-xl font-extrabold tracking-wider text-slate-900">SPELL</h1>
      <div class="flex-1 flex justify-center">
        <ul class="flex gap-6 text-sm md:text-base font-medium">
          <li><a href="#" class="hover:text-indigo-600 transition">Home</a></li>
          <li><a href="#" class="hover:text-indigo-600 transition">Laporan</a></li>
          <li><a href="#" class="hover:text-indigo-600 transition">Riwayat</a></li>
        </ul>
      </div>
      <div class="hidden md:block ml-4 text-sm text-slate-700">
        {{ date('Y M d | H:i') }}
      </div>
    </div>
  </nav>

  <!-- Form Register -->
  <div class="flex items-center justify-center pt-28 px-4">
    <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-xl">
      <h1 class="text-2xl font-bold text-center mb-6">Daftar Akun</h1>

      {{-- Tampilkan Error Validasi --}}
      @if ($errors->any())
        <div class="mb-4 p-3 rounded-xl bg-red-100 text-red-700 text-sm">
          <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input type="text" id="name" name="name" required value="{{ old('name') }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" required value="{{ old('email') }}"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
          <input type="password" id="password" name="password" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit"
                class="w-full py-2 px-4 bg-gradient-to-br from-[#2C3E50] to-[#34495E] text-white font-semibold rounded-xl transition duration-200" onclick="showCustomImageSwal1()">
          Daftar
        </button>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center text-sm font-medium text-gray-600 mt-24 mb-6">
    &copy; 2025 Sistem Pelaporan dan Edukasi Lalu Lintas
  </footer>

@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
    title: "Register Akun Berhasil",
    icon: "success",
    draggable: true
  });
  </script>
@endif

</body>
</html>
