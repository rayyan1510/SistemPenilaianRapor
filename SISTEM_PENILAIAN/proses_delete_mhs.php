<?php
session_start();

if ($_SESSION['status'] != 'login') {
    header('location:login.php?pesan=belum_login');
    exit();
}
require 'koneksi.php';


$id_mhs = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['id']));

// query hapus
$query = mysqli_query($koneksi, "DELETE FROM mahasiswas WHERE id_mhs = '$id_mhs'");

// cek $query
if ($query > 0) {
    echo "<script>alert('Data Berhasil di Hapus!'); window.location='mahasiswa_table.php'</script>";
} else {
    echo "<script>alert('Data Gagal di Hapus!'); window.location='mahasiswa_table.php'</script>";
}
