<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - SPELL</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    @keyframes fadeinb {
      0% { opacity: 0; transform: translateY(50px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeinb { animation: fadeinb 0.8s ease-out both; }
    body { font-family: 'Montserrat', sans-serif; }
  </style>
</head>
<body class="bg-gradient-to-b from-gray-100 to-gray-200 text-gray-800 min-h-screen flex flex-col">

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

<!-- Main Content -->
<div class="flex-grow flex justify-center items-center pt-28 px-4 pb-10">
  <div class="flex flex-col md:flex-row w-full max-w-6xl bg-white rounded-xl shadow-lg overflow-hidden animate-fadeinb">

    <!-- Panel -->
    <div class="w-full md:w-2/2 bg-gradient-to-br from-[#2C3E50] to-[#34495E] text-white p-10 flex flex-col justify-center items-center">
      <h2 class="text-6xl font-bold mb-4">SPELL</h2>
      <h2 class="text-xl font-bold mb-4">Sistem Pelaporan dan Edukasi Lalu Lintas</h2>
      <p class="text-center mb-6 text-sm md:text-base">Belum Punya Akun? Daftar Dulu</p>
      <a href="#"
         class="border border-white px-6 py-2 rounded-full hover:bg-white hover:text-[#2C3E50] transition text-sm md:text-base">
        Daftar
      </a>
    </div>

    <!-- Login Form -->
    <div class="w-full md:w-1/2 p-6 sm:p-10 md:p-12 flex flex-col justify-center">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>

      <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf
        
        <!-- Email Input -->
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email</label>
          <input 
            id="email"
            type="email" 
            name="email" 
            value="{{ old('email') }}"
            placeholder="Masukkan email Anda"
            required
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm @error('email') border-red-500 @enderror" 
          />
          @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
          <p id="email-error" class="text-red-500 text-xs mt-1 hidden"></p>
        </div>

        <!-- Password Input -->
        <div class="mb-6">
          <label for="password" class="block text-gray-700 text-sm font-medium mb-1">Password</label>
          <input 
            id="password"
            type="password" 
            name="password" 
            placeholder="Masukkan password Anda"
            required
            minlength="6"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm @error('password') border-red-500 @enderror" 
          />
          @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
          <p id="password-error" class="text-red-500 text-xs mt-1 hidden"></p>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit"
          class="w-full text-center bg-gradient-to-br from-[#2C3E50] to-[#34495E] text-white py-2 rounded-lg hover:bg-blue-600 transition text-sm font-medium"
        >
          Login
        </button>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center text-sm font-medium text-gray-600 mt-24 mb-6">
  &copy; SPELL. Semua hak dilindungi.
</footer>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Validation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('loginForm');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');
  const emailError = document.getElementById('email-error');
  const passwordError = document.getElementById('password-error');

  // Client-side validation
  form.addEventListener('submit', function(e) {
    let isValid = true;
    
    // Reset errors
    emailError.classList.add('hidden');
    passwordError.classList.add('hidden');
    emailInput.classList.remove('border-red-500');
    passwordInput.classList.remove('border-red-500');

    // Email validation
    if (!emailInput.value.trim()) {
      emailError.textContent = 'Email harus diisi';
      emailError.classList.remove('hidden');
      emailInput.classList.add('border-red-500');
      isValid = false;
    } else if (!/^\S+@\S+\.\S+$/.test(emailInput.value)) {
      emailError.textContent = 'Format email tidak valid';
      emailError.classList.remove('hidden');
      emailInput.classList.add('border-red-500');
      isValid = false;
    }

    // Password validation
    if (!passwordInput.value) {
      passwordError.textContent = 'Password harus diisi';
      passwordError.classList.remove('hidden');
      passwordInput.classList.add('border-red-500');
      isValid = false;
    } else if (passwordInput.value.length < 6) {
      passwordError.textContent = 'Password minimal 6 karakter';
      passwordError.classList.remove('hidden');
      passwordInput.classList.add('border-red-500');
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault();
    }
  });

  // Display server-side errors with SweetAlert
  @if($errors->any())
    Swal.fire({
      title: 'Error!',
      text: '{{ $errors->first() }}',
      icon: 'error',
      confirmButtonText: 'OK',
      background: '#ffffff',
      backdrop: `
        rgba(0,0,0,0.4)
      `
    });
  @endif

  @if(session('success'))
    Swal.fire({
      title: 'Sukses!',
      text: '{{ session('success') }}',
      icon: 'success',
      confirmButtonText: 'OK',
      background: '#ffffff'
    });
  @endif
});
</script>
</body>
</html>