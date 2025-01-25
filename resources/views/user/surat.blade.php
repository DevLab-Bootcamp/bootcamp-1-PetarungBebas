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
          <h2 class="text-xl font-bold">Surat Dokter</h2>
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
                

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Pasien
                </th>
                <th scope="col" class="px-6 py-3">
                    Diagnosa
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    Keterangan
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Hansen
                </th>
                <td class="px-6 py-4">
                    Diare
                </td>
                <td class="px-6 py-4">
                    22-01-2025
                </td>
                <td class="px-6 py-4">
                    Hindari makanan seperti telur
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Download</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Ahmad
                </th>
                <td class="px-6 py-4">
                    Demam Berdarah
                </td>
                <td class="px-6 py-4">
                    22-01-2025
                </td>
                <td class="px-6 py-4">
                    Istirahat 3 hari
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Download</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Siti
                </th>
                <td class="px-6 py-4">
                    Covid 19
                </td>
                <td class="px-6 py-4">
                    22-01-2025
                </td>
                <td class="px-6 py-4">
                    Istirahat 7 hari
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Download</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

      </div>    
    </div>
</body>
</html>