<?php
session_start();

if ($_SESSION['status'] != 'login') {
    header('location:login.php?pesan=belum_login');
    exit();
}
require 'koneksi.php';

$id_dosen = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['id']));

// query hapus
$query = mysqli_query($koneksi, "DELETE FROM dosens WHERE id_dosen = '$id_dosen'");

// cek $query
if ($query > 0) {
    echo "<script>alert('Data Berhasil di Hapus!'); window.location='dosen_table.php'</script>";
} else {
    echo "<script>alert('Data Gagal di Hapus!'); window.location='dosen_table.php'</script>";
}
