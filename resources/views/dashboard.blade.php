
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Klinik Dashboard</title>
  @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="bg-gray-100 ">
  <!-- Dashboard Container -->
  <div class="flex h-screen ">
    @extends('template.sidebar')
 
    <!-- Main Content -->
    <div class="flex-1 flex flex-col p-4 sm:ml-64">
      <!-- Header -->
      <header class="bg-white shadow p-4 flex items-center justify-between">
        <h2 class="text-xl font-bold">Dashboard</h2>
        <div class="flex items-center space-x-4">
          <input
            type="text"
            placeholder="Cari..."
            class="border rounded-lg px-4 py-2 text-sm"
          />
          <div class="flex items-center space-x-4">
            <a href="{{url('/auth-login')}}">
              <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center me-2 mb-2">Login</button>
            </a>
          </div>
        </div>
      </header>

      <!-- Content Area -->
      <!-- Main Content -->
  <div class="min-h-screen p-8">
    <!-- Section Header -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-4">
        Selamat Datang di Klinik UAD!
      </h1>
      <p class="text-gray-600">
        Klinik UAD adalah solusi kesehatan terpercaya yang mengutamakan kenyamanan dan kualitas pelayanan untuk Anda dan keluarga. Kami siap melayani Anda dengan fasilitas modern dan tim profesional.
      </p>
    </div>

    <!-- Layanan -->
    <div>
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Layanan Kami</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Layanan Card -->
        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="text-blue-500 mb-4">
            <i class="fas fa-user-md text-3xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Konsultasi Dokter Umum</h3>
          <p class="text-gray-600">
            Pelayanan kesehatan dengan dokter umum untuk kebutuhan sehari-hari.
          </p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="text-green-500 mb-4">
            <i class="fas fa-stethoscope text-3xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Poli Spesialis</h3>
          <p class="text-gray-600">
            Layanan dari dokter spesialis seperti anak, penyakit dalam, dan lainnya.
          </p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="text-red-500 mb-4">
            <i class="fas fa-flask text-3xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Layanan Laboratorium</h3>
          <p class="text-gray-600">
            Pemeriksaan laboratorium lengkap untuk mendukung diagnosa kesehatan Anda.
          </p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="text-yellow-500 mb-4">
            <i class="fas fa-syringe text-3xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Vaksinasi</h3>
          <p class="text-gray-600">
            Layanan vaksinasi untuk dewasa dan anak-anak sesuai kebutuhan.
          </p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="text-purple-500 mb-4">
            <i class="fas fa-pills text-3xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Apotek</h3>
          <p class="text-gray-600">
            Penyediaan obat-obatan lengkap yang terintegrasi dengan layanan kami.
          </p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
          <div class="text-pink-500 mb-4">
            <i class="fas fa-heartbeat text-3xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-800 mb-2">Pemeriksaan Kesehatan Berkala</h3>
          <p class="text-gray-600">
            Program cek kesehatan rutin untuk mendeteksi penyakit sejak dini.
          </p>
        </div>
      </div>
    </div>

    <!-- CTA Buttons -->
    <div class="mt-10 flex flex-wrap gap-4">
      <button class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600">
        Jadwalkan Konsultasi
      </button>
      <button class="bg-gray-100 text-gray-800 px-6 py-3 rounded-lg shadow hover:bg-gray-200">
        Lihat Semua Layanan
      </button>
      <button class="bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600">
        Hubungi Kami
      </button>
    </div>
  </div>
    </div>
  </div>
</body>

</html>
