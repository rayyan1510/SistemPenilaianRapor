<?php
session_start();

if ($_SESSION['status'] != 'login') {
    header('location:login.php?pesan=belum_login');
    exit();
}
require 'koneksi.php';

// jika tombol submit ditekan
if (isset($_POST['submit'])) {
    # ambil data dari form
    $id_kelas    = htmlspecialchars($_POST['id_kelas']);
    $nama_kelas  = htmlspecialchars($_POST['nama_kelas']);

    // cek jika datanya sama
    $query = mysqli_query($koneksi, "SELECT * FROM kelases WHERE nama_kelas = '$nama_kelas'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        # jika ada datanya
        echo "<script>alert('Data Kelas Sudah Ada'); window.location='kelas_table.php'</script>";
    } else {
        // query update
        $queryUpdate = mysqli_query($koneksi, "UPDATE kelases SET nama_kelas = '$nama_kelas' WHERE id_kelas = '$id_kelas' ");
        // cek query jika berhasil

        if ($queryUpdate > 0) {
            echo "<script>alert('Data Berhasil di Ubah!'); window.location='kelas_table.php'</script>";
        } else {
            echo "<script>alert('Data Gagal di Ubah!'); window.location='kelas_table.php'</script>";
        }
    }
}
