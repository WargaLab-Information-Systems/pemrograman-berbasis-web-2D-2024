<?php

include "koneksi.php";

// kita ambil data yang sudah dikirimkan oleh form-edit-data
$kode_buku = $_POST['kode-buku'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun_terbit = $_POST['tahun-terbit'];
$sampulBuku = $_FILES['sampul']['name'];
$sampulLama = $_POST['sampulLama'];

if($_FILES['sampul']['error']===4) {
    $sampulBuku = $sampulLama;
}else {
    $pathfile = '../img/'.$sampulLama;
    unlink($pathfile);

    move_uploaded_file($_FILES['sampul']['tmp-name'], '../img/' . $sampulBuku);
}

// query untuk mengubah apa yang telah diubah dengan menggunakan kode_buku sebagai isi klausa where
$sql = "UPDATE buku set judul = '$judul', penulis = '$penulis', tahun_terbit = '$tahun_terbit' , sampul = '$sampulBuku' where kode_buku = '$kode_buku'";

if($koneksi->query($sql) === TRUE){
    echo "Data Buku Berhasil Di Perbaharui";
    header ("refresh:3; ../index.php");
}else{
    echo "Error " . $sql . "<br> <br> <hr>" . $koneksi->error;
}

// $sql = "insert into buku values('$kodeBuku', '$judul', '$penulis', '$tahunTerbit', '$sampulBuku')";