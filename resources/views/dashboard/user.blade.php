<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KlinikKampus</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen ">
        @extends('template.sidebar')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col p-4 sm:ml-64 bg-blue-100">
        <!-- Header -->
        <header class="p-4 flex items-center justify-between">
          <h2 class="text-xl font-bold">Dashboard</h2>
          <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-4">
                <p>Daffa Alif Murtaja</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 ml-2 transition-transform duration-300 transform group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" id="arrow-icon">
                    <path d="M5 7l5 5 5-5H5z"/>
                  </svg>
            </div>
          </div>
        </header>
        <!-- Content Area -->
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-bold">Appointment Saya</h2>
                <div class="mt-4">
                  <p class="text-sm text-gray-600">Mon, 13 Jan 2025</p>
                  <p class="text-sm text-blue-600 font-semibold">07:00 - 10:00</p>
                  <p class="text-sm text-gray-600">Klinik UAD Kampus 4</p>
                  <p class="text-sm text-gray-600">dr. Yusuf Maulana Sarif</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="rounded-sm">
                    <rect width="24" height="24" fill="red" />
                    <path d="M3 6h18M10 11v6M14 11v6M5 6l1 14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-14M9 6V4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>                  
              </div>
         
              <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-bold">Jadwal Event</h2>
                <div class="mt-4">
                  <p class="text-sm text-gray-600">Event Besar UAD</p>
                  <p class="text-sm text-blue-600 font-semibold">
                    13 Jan 2025 - 15 Jan 2025<br />09:35:00
                  </p>
                  <p class="text-sm text-gray-600">Kuota: 200</p>
                </div>
                <button class="mt-4 text-blue-500 text-sm">Tambah</button>
              </div>

         <div class="bg-white shadow-md rounded-md p-4">
          <h2 class="text-lg font-bold">Jadwal Klinik Minggu ini</h2>
          <div class="mt-4 space-y-2">
            <div>
              <p class="text-sm font-semibold">Klinik UAD Kampus 4</p>
              <p class="text-sm text-gray-600">Mon, 13 Jan 2025 - 2 slots</p>
              <p class="text-sm text-gray-600">Tue, 14 Jan 2025 - 2 slots</p>
              <p class="text-sm text-gray-600">Wed, 15 Jan 2025 - 2 slots</p>
            </div>
            <div>
              <p class="text-sm font-semibold">Klinik UAD Kampus 3</p>
              <p class="text-sm text-gray-600">Mon, 13 Jan 2025 - 2 slots</p>
              <p class="text-sm text-gray-600">Tue, 14 Jan 2025 - 2 slots</p>
              <p class="text-sm text-gray-600">Wed, 15 Jan 2025 - 2 slots</p>
            </div>
          </div>
          <button class="mt-4 text-blue-500 text-sm">Lihat lebih lengkap</button>
        </div>
        </div>
      </div>
    </div>
</body>
</html>
