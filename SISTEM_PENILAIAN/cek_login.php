<?php
session_start();

require 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query(
    $koneksi,
    "select * from users where username='$username' and password='$password'"
);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    $nama = $data['nama'];
    $status = $data['status'];
    // cek jika user login sebagai admin
    if ($data['role'] == 'adm') {
        // buat session login dan username
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        $_SESSION['role'] = 'adm';
        // alihkan ke halaman dashboard admin
        header('location:dashboard.php');

        // cek jika user login sebagai pegawai
    } elseif ($data['role'] == 'dsn') {
        // buat session login dan username
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        $_SESSION['role'] = 'dsn';
        // alihkan ke halaman dashboard pegawai
        header('location:dashboard.php');

        // cek jika user login sebagai pengurus
    } elseif ($data['role'] == 'mhs') {
        // buat session login dan username
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        $_SESSION['role'] = 'mhs';
        // alihkan ke halaman dashboard pengurus
        header('location:dashboard.php');
    } else {
        // alihkan ke halaman login kembali
        header('location:index.php?pesan=gagal');
    }
} else {
    header('location:index.php?pesan=gagal');
}

?>
