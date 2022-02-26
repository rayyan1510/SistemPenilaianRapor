<?php
session_start();

if ($_SESSION['status'] != 'login') {
    header('location:login.php?pesan=belum_login');
    exit();
}
require 'koneksi.php';

// ambil id dari url
$id_tahun = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['id']));

// query hapus
$query = mysqli_query($koneksi, "DELETE FROM tahun_ajarans WHERE id_tahun = '$id_tahun'");

// cek $query
if ($query > 0) {
    echo "<script>alert('Data Berhasil di Hapus!'); window.location='tahun_table.php'</script>";
} else {
    echo "<script>alert('Data Gagal di Hapus!'); window.location='tahun_table.php'</script>";
}
