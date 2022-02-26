<?php
session_start();

if ($_SESSION['status'] != 'login') {
    header('location:login.php?pesan=belum_login');
    exit();
}
require 'koneksi.php';

if (isset($_POST['submit'])) {
    # ambil data dari form

    $nama_jurusan  = htmlspecialchars($_POST['nama_jurusan']);

    // di cek apakah data nya sudah ada atau belum
    $query = mysqli_query($koneksi, "SELECT * FROM jurusans WHERE nama_jurusan = '$nama_jurusan'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        # jika ada datanya
        echo "<script>alert('Data Jurusan Sudah Ada'); window.location='jurusan_table.php'</script>";
    } else {
        // jika blm ada
        $query = mysqli_query($koneksi, "INSERT INTO jurusans VALUES ('', '$nama_jurusan')");

        if ($query) {
            echo "<script>alert('Data Berhasil di Tambahkan!'); window.location='jurusan_table.php'</script>";
        } else {
            echo "<script>alert('Data Gagal di Tambahkan!'); window.location='jurusan_table.php'</script>";
        }
    }
}
