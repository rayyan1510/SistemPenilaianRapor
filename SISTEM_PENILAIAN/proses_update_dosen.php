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
    $id_dosen    = htmlspecialchars($_POST['id_dosen']);
    $nip         = htmlspecialchars($_POST['nip']);
    $nama_dosen  = htmlspecialchars($_POST['nama']);

    // query update
    $query = mysqli_query($koneksi, "UPDATE dosens SET nip = '$nip', nama_dosen = '$nama_dosen' WHERE id_dosen = '$id_dosen' ");
    // cek query jika berhasil

    if ($query > 0) {
        echo "<script>alert('Data Berhasil di Ubah!'); window.location='dosen_table.php'</script>";
    } else {
        echo "<script>alert('Data Gagal di Ubah!'); window.location='dosen_table.php'</script>";
    }
}
