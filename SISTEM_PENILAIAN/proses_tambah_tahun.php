<?php
session_start();

if ($_SESSION['status'] != 'login') {
    header('location:login.php?pesan=belum_login');
    exit();
}
require 'koneksi.php';

if (isset($_POST['submit'])) {
    # ambil data dari form

    $tahun_ajaran  = htmlspecialchars($_POST['tahun_ajaran']);

    // di cek apakah data nya sudah ada atau belum
    $query = mysqli_query($koneksi, "SELECT * FROM tahun_ajarans WHERE tahun_ajaran = '$tahun_ajaran'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        # jika ada datanya
        echo "<script>alert('Data Tahun Ajaran Sudah Ada'); window.location='tahun_table.php'</script>";
    } else {
        // jika blm ada
        $query = mysqli_query($koneksi, "INSERT INTO tahun_ajarans VALUES ('', '$tahun_ajaran')");

        if ($query) {
            echo "<script>alert('Data Berhasil di Tambahkan!'); window.location='tahun_table.php'</script>";
        } else {
            echo "<script>alert('Data Gagal di Tambahkan!'); window.location='tahun_table.php'</script>";
        }
    }
}
