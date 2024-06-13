<?php

include "koneksi.php";

// kita ambil data yang sudah dikirimkan oleh form-edit-data
$kode_buku = $_POST['kode-buku'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun_terbit = $_POST['tahun-terbit'];
$gambarLama = $_POST['gambarLama'];
$gambar = $_FILES['gambar']['name'];

if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
}else {
    $pathFile = '../gambar/' . $gambarLama;
    unlink($pathFile);

    move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/' . $gambar);
}

// query untuk mengubah apa yang telah diubah dengan menggunakan kode_buku sebagai isi klausa where
$sql = "UPDATE buku set judul = '$judul', penulis = '$penulis', tahun_terbit = $tahun_terbit, gambar='$gambar' where kode_buku = '$kode_buku'";

if($koneksi->query($sql) === TRUE){
    echo "Data Buku Berhasil Di Perbaharui";
    header ("refresh:3; ../index.php");
}else{
    echo "Error " . $sql . "<br> <br> <hr>" . $koneksi->error;
}