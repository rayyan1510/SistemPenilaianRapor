<?php
session_start();

if ($_SESSION['status'] != 'login') {
    header('location:login.php?pesan=belum_login');
    exit();
}
require 'koneksi.php';

if (isset($_POST['submit'])) {
    # ambil data dari form
    $nip         = htmlspecialchars($_POST['nip']);
    $nama_dosen  = htmlspecialchars($_POST['nama']);

    // di cek apakah data nya sudah ada atau belum
    $query = mysqli_query($koneksi, "SELECT * FROM dosens WHERE nip = '$nip'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        # jika ada datanya
        echo "<script>alert('Data Dosen Sudah Ada'); window.location='dosen_table.php'</script>";
    } else {
        // jika blm ada
        $query = mysqli_query($koneksi, "INSERT INTO dosens VALUES ('', '$nip', '$nama_dosen')");

        if ($query) {
            echo "<script>alert('Data Berhasil di Tambahkan!'); window.location='dosen_table.php'</script>";
        } else {
            echo "<script>alert('Data Gagal di Tambahkan!'); window.location='dosen_table.php'</script>";
        }
    }
}
