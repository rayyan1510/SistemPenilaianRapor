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
    <title>Form Login</title>
    <script src="assets/js/3.0.0"></script>
  </head>
  <body>
    <div
      class="min-h-screen bg-gray-50 text-gray-800 antialiased py-6 flex flex-col items-center justify-center relative overflow-hidden sm:py-12"
    >        
      <div class="relative py-3 sm:w-96 sm:max-auto text-center">
        <span class="text-3xl font-light">Sistem Penilaian Akademik</span>
        <div class="mt-4 bg-white shadow-md rounded-lg text-left">
          <div class="h-2 bg-indigo-500 rounded-t-md"></div>
          <form action="cek_login.php" method="POST">
          <div class="px-8 py-6">              
            <label class="block font-semibold" for="username">Username</label>
            <input
              type="text"
              placeholder="username"
              class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-1 focus:ring-indigo-600 rounded-md" name="username"
            />
            <label class="block font-semibold" for="password">Password</label>
            <input
              type="password"
              placeholder="password"
              class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-1 focus:ring-indigo-600 rounded-md"name="password"
            />
            <div class="flex justify-between items-baseline">
              <button
                class="mt-4 bg-indigo-500 text-white py-2 px-6 rounded-md hover:bg-indigo-600"
                type="submit" value="login" name="login"
              >
                Login
              </button>              
              <a href="" class="text-sm hover:underline">Lupa Password?</a>
            </div>
          </div>
          <div class="h-2 bg-indigo-500 rounded-b-md"></div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
