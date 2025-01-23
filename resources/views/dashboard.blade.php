
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
          <div class="flex items-center space-x-2">
            <span class="material-icons">account_circle</span>
            <span>Admin</span>
          </div>
        </div>
      </header>

      <!-- Content Area -->
      <main class="flex-grow p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Cards -->
          <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold">Pasien</h3>
            <p class="text-2xl font-bold">120</p>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold">Dokter</h3>
            <p class="text-2xl font-bold">15</p>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold">Jadwal Hari Ini</h3>
            <p class="text-2xl font-bold">10</p>
          </div>
          <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold">Feedback</h3>
            <p class="text-2xl font-bold">32</p>
          </div>
        </div>

        <div class="mt-6">
          <!-- Table -->
          <h3 class="text-xl font-bold mb-4">Daftar Pasien Terbaru</h3>
          <table class="table-auto w-full bg-white shadow rounded-lg">
            <thead>
              <tr class="bg-gray-200">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama Pasien</th>
                <th class="px-4 py-2">Umur</th>
                <th class="px-4 py-2">Tanggal Kunjungan</th>
                <th class="px-4 py-2">Dokter</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border px-4 py-2">1</td>
                <td class="border px-4 py-2">John Doe</td>
                <td class="border px-4 py-2">30</td>
                <td class="border px-4 py-2">2025-01-17</td>
                <td class="border px-4 py-2">Dr. Smith</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">2</td>
                <td class="border px-4 py-2">Jane Roe</td>
                <td class="border px-4 py-2">25</td>
                <td class="border px-4 py-2">2025-01-17</td>
                <td class="border px-4 py-2">Dr. Taylor</td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <button type="submit" id="redirectButton" class="w-full text-black bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
</body>

<script>
    // Mengambil tombol dengan id "redirectButton"
    document.getElementById('redirectButton').addEventListener('click', function() {
        // Mengambil token JWT dari localStorage
        const token = localStorage.getItem('jwtToken');
        
        // Mengecek apakah token ada
        if (token) {
            // Mengalihkan pengguna ke halaman baru dengan menambahkan token ke header
            fetch('/admin', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json()) // Mengambil data dalam format JSON
            .then(data => {
              console.log(data);
                if (response.ok) {
                    window.location.href = '/admin';  // Jika token valid, redirect ke halaman admin
                } else {
                    // Menampilkan pesan error dari response jika ada
                    const errorMessage = data.message || 'Terjadi kesalahan pada server.';
                    alert(errorMessage);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan');
            });
        } else {
            alert('Anda harus login terlebih dahulu');
        }
    });
</script>
</html>
