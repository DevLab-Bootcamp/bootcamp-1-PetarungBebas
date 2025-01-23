<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Klinik sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto  bg-white">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="#" class="flex font-bold items-center p-2 text-blue-600 rounded-lg group">
               <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                  <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z" />
                </svg>                
               <span class="ms-3 text-2xl">KlinikKampus</span>
            </a>
         </li>
          <li>
             <a href="{{url('/dashboard-user')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-600 dark:hover:bg-gray-700 group hover:text-white ">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400  dark:group-hover:text-white group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                   <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
             </a>
          </li>
          <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-600 dark:hover:bg-gray-700 group hover:text-white" id="jadwal-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 4h-1V2a1 1 0 0 0-2 0v2H8V2a1 1 0 0 0-2 0v2H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V10h16v9zm0-11H4V7a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V6h8v1a1 1 0 0 0 2 0V6h1a1 1 0 0 1 1 1z"/>
              </svg>
              <span class="flex-1 ms-3 whitespace-nowrap">Jadwal</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 ml-2 transition-transform duration-300 transform group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" id="arrow-icon">
                <path d="M5 7l5 5 5-5H5z"/>
              </svg>
            </a>
            <!-- Menu dropdown (optional) -->
            <ul class="hidden group-hover:block" id="submenu">
              <li><a href="#">Submenu 1</a></li>
              <li><a href="#">Submenu 2</a></li>
            </ul>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-600 dark:hover:bg-gray-700 group hover:text-white">
               <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M19 2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3zM5 4h14a1 1 0 0 1 1 1v4H4V5a1 1 0 0 1 1-1zm14 16H5a1 1 0 0 1-1-1v-8h16v8a1 1 0 0 1-1 1zm-6-9h-2v2h-2v2h2v2h2v-2h2v-2h-2V9z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Surat Dokter</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-600 dark:hover:bg-gray-700 group hover:text-white">
               <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M19 2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3zM5 4h14a1 1 0 0 1 1 1v4H4V5a1 1 0 0 1 1-1zm14 16H5a1 1 0 0 1-1-1v-8h16v8a1 1 0 0 1-1 1zm-7-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0zm-3 2.75h2.25l1.5 2 1.5-2H15a2 2 0 0 1 2 2v1h-9v-1a2 2 0 0 1 2-2h.5z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Medical Checkup</span>
             </a>
          </li>
          <li>
             <a href="{{url('/auth-login')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-600 dark:hover:bg-gray-700 group hover:text-white">
               <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm0 2l4 4h-4V4zm-8 2h8v2H6V6zm0 4h8v2H6v-2zm0 4h8v2H6v-2zm0 4h8v2H6v-2z"/>
                  <path d="M9 11l2 2 4-4-1.5-1.5L11 11.5l-1.5-1.5L9 11z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap ">Riwayat Pemeriksaan</span>
             </a>
          </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-600 dark:hover:bg-gray-700 group hover:text-white">
               <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M19 3h-3V1h-2v2H10V1H8v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm-1 16H6V8h12v11z"/>
                </svg>                
                <span class="flex-1 ms-3 whitespace-nowrap">Event</span>
             </a>
          </li>
       </ul>
    </div>
 </aside>
 
 
 <script>
 document.getElementById('jadwal-toggle').addEventListener('click', function(event) {
   // Mencegah tautan untuk tidak berpindah halaman
   event.preventDefault();
 
   // Toggle rotasi segitiga
   const arrowIcon = document.getElementById('arrow-icon');
   const submenu = document.getElementById('submenu');
 
   // Cek apakah menu sudah terbuka atau tertutup
   arrowIcon.classList.toggle('rotate-180');
   submenu.classList.toggle('hidden');
 });
 </script>

 