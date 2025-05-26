<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SPELL</title>

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- Tailwind CSS via Vite -->
    @vite('resources/css/app.css')


  </head>
  <body class="bg-gradient-to-b from-gray-100 to-gray-200 text-gray-800">

 <!-- Navbar -->
    <nav class="fixed top-0 w-full backdrop-blur bg-white/80 shadow-sm z-50">
  <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
    <h1 class="text-xl font-extrabold tracking-wider text-slate-900">SPELL</h1>

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


    <!-- Hero Section -->
    <section class="pt-32 pb-16 flex flex-col items-center text-center px-4 ">
      <div class="bg-white/80 backdrop-blur-md shadow-lg rounded-3xl p-10 w-full max-w-2xl animate-fadeinb">
        <h1 class="text-5xl font-extrabold text-slate-900 drop-shadow-md">SPELL</h1>
        <h2 class="mt-4 text-xl font-medium text-gray-700">
          Sistem Pelaporan & Edukasi Lalu Lintas
        </h2>
      </div>
    </section>

    <!-- Intro Text -->
    <section class="max-w-2xl mx-auto md:px-0 text-justify bg-white rounded-3xl shadow-md py-10 px-8 animate-fadeinb">
      <p class="text-base md:text-lg font-light leading-relaxed text-gray-800 lg:ml-6 lg:mr-6">
        <strong class="text-gray-900 font-semibold">Selamat</strong> datang di sistem <span class="italic text-gray-700">Pelaporan dan Edukasi Lalu Lintas</span>,
        <span class="font-bold text-indigo-600 ">SPELL</span>. Di sini, masyarakat dapat melaporkan pelanggaran di jalan raya serta
        mendapatkan edukasi seputar tata tertib dan keselamatan. Silakan login untuk memulai laporan.
      </p>

      <!-- Login Button -->
      <div class="text-center mt-8">
        <button class="relative inline-block px-8 py-3 bg-gradient-to-br from-[#2C3E50] to-[#34495E] text-white font-semibold rounded-xl
         overflow-hidden group transition duration-300 shadow-md hover:shadow-xl">
          <span class="absolute inset-0 transform scale-0 group-hover:scale-100 transition-transform bg-white opacity-10"></span>
          <span class="relative z-10 " ><a href="{{ route('masuk') }}">Login</span></a>
        </button>
      </div>
    </section>

    <!-- Image  -->
    <section class="flex flex-col items-center mt-16 px-4 text-center">
      <img src="{{ url('img/polisi.png') }}" width="220" class="mb-4 drop-shadow-lg" />
      <h2 class="text-xl md:text-2xl font-bold text-slate-800">
        Terus, apa saja pelanggaran yang paling sering dilakukan?
      </h2>

       <section class=" flex flex-col max-w-2xl lg:w-2xs mx-auto md:px-0 text-justify bg-white rounded-3xl shadow-md py-10 px-8 animate-fadeinb text-white mt-9">
        <button class="bg-gradient-to-br from-[#2C3E50] to-[#34495E] rounded-3xl px-5 h-11 shadow-xl  " onclick="showCustomImageSwal1()">Pelanggaran 1</button >
        <button class="bg-gradient-to-br from-[#2C3E50] to-[#34495E] rounded-3xl px-5 h-11 mt-10 shadow-xl" onclick="showCustomImageSwal2()" >Pelanggaran 2</button>
        <button class="bg-gradient-to-br from-[#2C3E50] to-[#34495E] rounded-3xl px-5 h-11 mt-10 shadow-xl" onclick="showCustomImageSwal3()">Pelanggaran 3</button>
       </section>



    <!-- Footer -->


    <footer class="text-center text-sm font-medium text-gray-600 mt-24 mb-6">

     &copy; 2025 Sistem Pelaporan dan Edukasi Lalu Lintas
    </footer>


 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
window.showCustomImageSwal1 = function () {
  Swal.fire({
    title: "Melanggar lampu merah",
    text: "Dikutip dari IIHS.org,  berdasarkan data tahun 2022 sebanyak 1149 orang tewas karena melanggar lampu merah (Foto oleh Vadim Timayev).",
    imageUrl: "https://images.pexels.com/photos/12365433/pexels-photo-12365433.jpeg",
    imageWidth: 400,
    imageHeight: 400,
    imageAlt: "Lampu merah"
  });
}
window.showCustomImageSwal2 = function () {
  Swal.fire({
    title: "Melanggar rambu lalu lintas",
    text: "Melanggar rambu lalu lintas bisa berujung pada denda atau kurungan, serta membahayakan keselamatan diri sendiri dan orang lain, terutama jika rambu berkaitan dengan kecepatan, arah, atau bahaya (gambar dari Istock). ",
    imageUrl: "https://cdn.pixabay.com/photo/2012/04/24/11/23/no-u-turn-39416_1280.png",
    imageWidth: 400,
    imageHeight: 400,
    imageAlt: "Lampu merah"
  });
};
window.showCustomImageSwal3 = function () {
  Swal.fire({
    title: "Tidak Pakai Helm",
    text: "Tidak memakai helm meningkatkan risiko cedera serius saat kecelakaan, dan bisa dikenai sanksi sesuai aturan lalu lintas (gambar dari freepik). ",
    imageUrl: "https://img.freepik.com/free-photo/motorcycle-safety-helmet_23-2151531217.jpg?semt=ais_hybrid&w=740",
    imageWidth: 400,
    imageHeight: 400,
    imageAlt: "Lampu merah"
  });
};



  </script>
  </body>
</html>
