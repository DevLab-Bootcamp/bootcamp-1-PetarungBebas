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
          <h2 class="text-xl font-bold">Medical Checkup</h2>
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

      </div>    
    </div>
</body>
</html>