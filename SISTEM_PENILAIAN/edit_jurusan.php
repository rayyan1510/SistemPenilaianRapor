<?php
session_start();
if ($_SESSION['status'] != 'login') {
  header('location:login.php?pesan=belum_login');
  exit();
}
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Mahasiswa</title>

  <link rel="stylesheet" href="assets/css/flowbite.min.css" />
  <link rel="stylesheet" href="app.css" />
</head>

<body class="antialiased min-h-screen relative lg:flex" x-data="{open : false}">
  <!-- sidebar -->
  <nav class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-500 -translate-x-full lg:relative z-10 w-60 sm:w-55 bg-indigo-800 text-white h-screen p-1" :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0' :open === false }">
    <div class="flex justify-between">
      <span class="font-bold text-2xl sm:text-3xl p-2">
        SpA
      </span>
      <button class="p-2 focus:outline-none focus:bg-indigo-700 hover:bg-indigo-700 rounded-md lg:hidden" @click="open = false">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <ul class="mt-8">
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <a href="dashboard.php" class="block px-4 py-2 hover:bg-indigo-700 rounded-md flex justify-between">
          Dashboard
        </a>
      </li>
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <a href="mahasiswa_table.php" class="block px-4 py-2 hover:bg-indigo-700 rounded-md flex justify-between">
          Data Mahasiswa
        </a>
      </li>
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path d="M12 14l9-5-9-5-9 5 9 5z" />
          <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
        </svg>
        <a href="dosen_table.php" class="block px-4 py-2 hover:bg-indigo-700 rounded-md flex justify-between">
          Data Dosen
        </a>
      </li>
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 
  9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477
   5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168
    5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 
    18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
        <a href="matkul_table.php" class="block px-4 py-2 hover:bg-indigo-700 rounded-md flex justify-between">
          Data Mata Kuliah
        </a>
      </li>
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.871 4A17.926 17.926 0 003 12c0 2.874.673 5.59 1.871 8m14.13 0a17.926 17.926 0 001.87-8c0-2.874-.673-5.59-1.87-8M9 9h1.246a1 1 0 01.961.725l1.586 5.55a1 1 0 00.961.725H15m1-7h-.08a2 2 0 00-1.519.698L9.6 15.302A2 2 0 018.08 16H8" />
        </svg>
        <a href="nilai_table.php" class="block px-4 py-2 hover:bg-indigo-700 rounded-md flex justify-between">
          Data Nilai
        </a>
      </li>
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <a href="kelas_table.php" class="block px-4 py-2 hover:bg-indigo-700 rounded-md flex justify-between">
          Data Kelas
        </a>
      </li>
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        </svg>
        <a href="jurusan_table.php" class="block px-4 py-2 hover:bg-indigo-700 rounded-md flex justify-between">
          Data Jurusan
        </a>
      </li>
      <li class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <a href="tahun_table.php" class="block px-4 py-2 hover:bg-indigo-700 rounded-md flex justify-between">
          Data Tahun Ajaran
        </a>
      </li>
    </ul>
  </nav>

  <!-- topbar -->
  <div class="relative z-0 lg:flex-grow">
    <header class="flex items-center bg-white shadow-sm text-indigo-700">
      <button class="p-2 focus:outline-none focus:bg-gray-100 hover:bg-gray-100 rounded-md lg:hidden" @click="open = true">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
        </svg>
      </button>
      <span class="block text-2xl sm:text-3xl font-bold text-indigo-600 p-4">
        Sistem Penilaian
      </span>

      <button id="dropdownButton" data-dropdown-toggle="dropdown" class="text-indigo rounded-md px-4 py-2.5 text-center inline-flex items-center ml-auto mr-4" type="button">
        <?= $_SESSION['nama'] ?>
        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>

      <div id="dropdown" class="hidden z-10 w-30 text-base list-none bg-white hover:bg-indigo-200 rounded">
        <ul class="py-1" aria-labelledby="dropdownButton flex">
          <li class="flex items-center ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <a href="logout.php" class="block py-2 px-4 text-indigo mr-4">
              Logout
            </a>
          </li>
        </ul>
      </div>
    </header>
    <!-- content goes here -->

    <?php

    // ambil id dari $_get;
    $id_jurusan = $_GET['id'];

    // buat query untuk menampilkan data ke form berdasarkan id
    $query = mysqli_query($koneksi, "SELECT * FROM jurusans WHERE id_jurusan = '$id_jurusan'");
    $data = mysqli_fetch_assoc($query);

    ?>

    <div class="flex justify-center flex-wrap py-6 px-6">
      <div class=" w-96 w-12/12 sm:w-12/12 p-3 shadow-sm bg-gray-100 rounded">
        <form action="proses_update_jurusan.php" method="POST">
          <input type="hidden" name="id_jurusan" value="<?= $data['id_jurusan']; ?>">
          <div class="px-12 ">
            <label for="nama_jurusan" class="block mb-2 text-md text-indigo-500">Nama jurusan</label>
            <input type="text" class="shadow-sm bg-gray-50 border border-indigo-800 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-indigo-800 w-64" name="nama_jurusan" value="<?= $data['nama_jurusan']; ?>" id="nama_jurusan" required>
          </div>

          <div class="flex justify-between items-baseline px-12">
            <button class="mt-4 bg-indigo-500 text-white py-2 px-6 rounded-md hover:bg-indigo-600" type="submit" name="submit" value="submit">
              Edit
            </button>
            <a href="jurusan_table.php" class="text-sm hover:underline">Kembali</a>
          </div>

        </form>
      </div>
    </div>
</body>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/flowbite.bundle.js"></script>
<script src="assets/js/3.0.0"></script>
<script src="assets/js/cdn.min.js"></script>

</html>