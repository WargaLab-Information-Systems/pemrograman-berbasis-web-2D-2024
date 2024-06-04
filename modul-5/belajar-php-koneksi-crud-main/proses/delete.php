<?php

include "koneksi.php";

// Ambil kode buku yang dikirimkan lewat link dari index.php menggunakan metode GET
$kode_buku = $_GET["kode_buku"];

// Dapatkan path file gambar untuk dihapus dari server
$sql = "SELECT file_path FROM buku WHERE kode_buku = '$kode_buku'";
$result = $koneksi->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $filePath = $row['file_path'];

    // Hapus file gambar dari server jika ada
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

// Query untuk menghapus data buku berdasarkan kode_buku
$sql = "DELETE FROM buku WHERE kode_buku = '$kode_buku'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data Buku Berhasil Dihapus";
    header("refresh:3; ../index.php");
} else {
    echo "Error: " . $sql . "<br> <br> <hr>" . $koneksi->error;
}
?>
