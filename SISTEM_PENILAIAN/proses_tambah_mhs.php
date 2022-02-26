<?php
session_start();

if ($_SESSION['status'] != 'login') {
    header('location:login.php?pesan=belum_login');
    exit();
}
require 'koneksi.php';

if (isset($_POST['submit'])) {
    # ambil data dari form
    $nim         = htmlspecialchars($_POST['nim']);
    $nama        = htmlspecialchars($_POST['nama']);
    $jurusan     = htmlspecialchars($_POST['jurusan']);
    $kelas       = htmlspecialchars($_POST['kelas']);
    $tahun_masuk = $_POST['tahun_masuk'];

    // di cek apakah data nya sudah ada atau belum
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswas WHERE nim = '$nim'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        # jika ada datanya
        echo "<script>alert('Data Mahasiswa Sudah Ada'); window.location='mahasiswa_table.php'</script>";
    } else {
        // jika blm ada
        $query = mysqli_query($koneksi, "INSERT INTO mahasiswas VALUES ('', '$nim', '$nama', '$jurusan', '$kelas', '$tahun_masuk')");

        if ($query) {
            echo "<script>alert('Data Berhasil di Tambahkan!'); window.location='mahasiswa_table.php'</script>";
        } else {
            echo "<script>alert('Data Gagal di Tambahkan!'); window.location='mahasiswa_table.php'</script>";
        }
    }
}
