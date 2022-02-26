<?php
session_start();

if ($_SESSION['status'] != 'login') {
    header('location:login.php?pesan=belum_login');
    exit();
}
require 'koneksi.php';

if (isset($_POST['submit'])) {
    # ambil data dari form

    $nama_kelas  = htmlspecialchars($_POST['nama_kelas']);

    // di cek apakah data nya sudah ada atau belum
    $query = mysqli_query($koneksi, "SELECT * FROM kelases WHERE nama_kelas = '$nama_kelas'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        # jika ada datanya
        echo "<script>alert('Data Kelas Sudah Ada'); window.location='kelas_table.php'</script>";
    } else {
        // jika blm ada
        $query = mysqli_query($koneksi, "INSERT INTO kelases VALUES ('', '$nama_kelas')");

        if ($query) {
            echo "<script>alert('Data Berhasil di Tambahkan!'); window.location='kelas_table.php'</script>";
        } else {
            echo "<script>alert('Data Gagal di Tambahkan!'); window.location='kelas_table.php'</script>";
        }
    }
}
