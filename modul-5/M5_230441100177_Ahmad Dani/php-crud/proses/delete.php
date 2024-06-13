<?php

include "koneksi.php";

// kita ambil kode buku yang sudah dikirimkan lewat link dari index.php menggunakan methode Get
$kode_buku = $_GET["kode_buku"];

// query name gambar
$sqlImage = "SELECT gambar FROM buku WHERE kode_buku='$kode_buku'";
$fileName = $koneksi->query($sqlImage)->fetch_assoc();

if ($fileName['gambar']) {
    $pathFile = '../gambar/' . $fileName['gambar'];
    unlink($pathFile);
}

// Query untuk menghapus yang disesuaikan dengan klausa where kode_buku 
$sql = "DELETE FROM buku WHERE kode_buku = '$kode_buku'";

if($koneksi->query($sql) === TRUE){
    echo "Data Buku Berhasil Di Hapus";
    header ("refresh:3; ../index.php");
}else{
    echo "Error " . $sql . "<br> <br> <hr>" . $koneksi->error;
}