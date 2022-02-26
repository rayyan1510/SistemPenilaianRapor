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
    $id_jurusan    = htmlspecialchars($_POST['id_jurusan']);
    $nama_jurusan  = htmlspecialchars($_POST['nama_jurusan']);

    // cek jika datanya sama
    $query = mysqli_query($koneksi, "SELECT * FROM jurusans WHERE nama_jurusan = '$nama_jurusan'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        # jika ada datanya
        echo "<script>alert('Data Jurusan Sudah Ada'); window.location='jurusan_table.php'</script>";
    } else {
        // query update
        $queryUpdate = mysqli_query($koneksi, "UPDATE jurusans SET nama_jurusan = '$nama_jurusan' WHERE id_jurusan = '$id_jurusan' ");
        // cek query jika berhasil

        if ($queryUpdate > 0) {
            echo "<script>alert('Data Berhasil di Ubah!'); window.location='jurusan_table.php'</script>";
        } else {
            echo "<script>alert('Data Gagal di Ubah!'); window.location='jurusan_table.php'</script>";
        }
    }
}
