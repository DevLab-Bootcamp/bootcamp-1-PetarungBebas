<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Dokter</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen ">
        @extends('template.sidebar')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col p-4 sm:ml-64 bg-blue-100">
        <!-- Header -->
        <header class="p-4 flex items-center justify-between">
          <h2 class="text-xl font-bold">Daftar Event</h2>
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
        <div class="bg-white shadow-md rounded-md p-4 h-56 w-72">
            <h2 class="text-lg font-bold">Jadwal Event</h2>
            <div class="mt-4">
              <p class="text-sm text-gray-600">Event Besar UAD</p>
              <p class="text-sm text-blue-600 font-semibold">
                13 Jan 2025 - 15 Jan 2025<br />09:35:00
              </p>
              <p class="text-sm text-gray-600">Kuota: 200</p>
              <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Daftar</button>
            </div>
          </div>
      </div>    
    </div>
</body>
</html>