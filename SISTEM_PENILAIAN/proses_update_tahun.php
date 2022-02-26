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
    $id_tahun    = htmlspecialchars($_POST['id_tahun']);
    $tahun_ajaran  = htmlspecialchars($_POST['tahun_ajaran']);

    // cek jika datanya sama
    $query = mysqli_query($koneksi, "SELECT * FROM tahun_ajarans WHERE tahun_ajaran = '$tahun_ajaran'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        # jika ada datanya
        echo "<script>alert('Data Tahun Sudah Ada'); window.location='tahun_table.php'</script>";
    } else {
        // query update
        $queryUpdate = mysqli_query($koneksi, "UPDATE tahun_ajarans SET tahun_ajaran = '$tahun_ajaran' WHERE id_tahun = '$id_tahun' ");
        // cek query jika berhasil

        if ($queryUpdate > 0) {
            echo "<script>alert('Data Berhasil di Ubah!'); window.location='tahun_table.php'</script>";
        } else {
            echo "<script>alert('Data Gagal di Ubah!'); window.location='tahun_table.php'</script>";
        }
    }
}
