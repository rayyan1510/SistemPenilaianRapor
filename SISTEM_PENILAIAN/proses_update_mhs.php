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
    $id_mhs      = htmlspecialchars($_POST['id_mhs']);
    $nim         = htmlspecialchars($_POST['nim']);
    $nama_mhs    = htmlspecialchars($_POST['nama']);
    $jurusan     = htmlspecialchars($_POST['jurusan']);
    $kelas       = htmlspecialchars($_POST['kelas']);
    $tahun_masuk = $_POST['tahun_masuk'];

    // query update
    $query = mysqli_query($koneksi, "UPDATE mahasiswas SET nim = '$nim', nama_mhs = '$nama_mhs', jurusan = '$jurusan', kelas = '$kelas', tahun_masuk = '$tahun_masuk' WHERE id_mhs = '$id_mhs' ");
    // cek query jika berhasil

    if ($query > 0) {
        echo "<script>alert('Data Berhasil di Ubah!'); window.location='mahasiswa_table.php'</script>";
    } else {
        echo "<script>alert('Data Gagal di Ubah!'); window.location='mahasiswa_table.php'</script>";
    }
}
