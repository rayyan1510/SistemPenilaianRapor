<?php
session_start();
if (isset($_SESSION['status'])) {
    header('location:dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Penilaian Akademik</title>
    <script src="assets/js/3.0.0"></script>
    <!-- <script>
        const btn = document.querySelector('button.mobile-menu-button')
        const menu = document.querySelector('.mobile-menu')

        btn.addEventListener('click', () => {
          menu.classList.toggle('hidden')
        })
      </script> -->
  </head>
  <body>
    <!-- Navbar goes here -->
    <nav class="bg-white shadow-sm">
      <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
          <div class="flex space-x-7">
            <div>
              <!-- Website Logo -->
              <a href="#" class="flex items-center py-4 px-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-7 w-7 text-indigo-500 mr-2"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"
                  />
                </svg>
                <span class="font-semibold text-indigo-500 text-lg">
                  Sistem Penilaian
                </span>
              </a>
            </div>
            <!-- Primary Navbar items -->
          </div>
          <!-- Secondary Navbar items -->
          <div class="hidden md:flex items-center space-x-3">
            <a
              href="login.php"
              class="py-2 px-2 font-medium text-2sm text-indigo-500 rounded hover:bg-indigo-500 hover:text-white transition duration-300"
            >
              You aren't Logged in. (log in)
            </a>
          </div>
          <!-- Mobile menu button -->
          <div class="md:hidden flex items-center">
            <a
              href="login.html"
              class="py-2 px-2 font-medium text-2sm text-indigo-500 rounded hover:bg-indigo-500 hover:text-white transition duration-300"
            >
              Log In
            </a>
          </div>
        </div>
      </div>
    </nav>

    <!-- Content goes here -->
    <div class="flex justify-between flex-wrap px-6 py-12 md:mx-4">
      <div class="w-full md:w-12/12 sm:w-12/12 px-4">
        <div class="border-2 border-opacity-50 rounded-lg p-8">
          <h2 class="flex items-center font-bold text-lg text-blue-600">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-12 w-12 text-blue-700"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"
              />
            </svg>
            Sistem Penilaian Akademis
          </h2>
        </div>
      </div>
      <div class="w-full md:w-6/12 sm:w-12/12 px-4">
        <div class="border-2 border-opacity-50 p-8 rounded-lg my-6">
          <h2 class="flex items-center font-bold text-lg text-blue-600">
            Site Anouncement
          </h2>
          <p class="text-white text-semibold bg-red-300 px-2 py-2 mt-2">
            You're Not be Able to see the table because you aren't logged.
          </p>
          <p class="text-blue-600 text-semibold mt-2">
            (There are no tables yet!)
          </p>
        </div>
      </div>
      <div class="w-full md:w-6/12 sm:w-12/12 px-4">
        <div class="border-2 border-opacity-50 p-8 rounded-lg my-6">
          <h2
            class="flex items-center justify-center font-semibold text-lg text-blue-600"
          >
            Sistem Penilaian Akademik
          </h2>
          <p class="text-blue-600 text-light">
            Selamat datang di aplikasi sistem penilaian akademik mahasiswa.
            Aplikasi ini berfungsi untuk mahasiswa melihat nilainya secara
            online dan memudahkan dosen untuk memberi nilai pada mahasiswa pada
            tiap kelas yang dosen tersebut masuki.
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
