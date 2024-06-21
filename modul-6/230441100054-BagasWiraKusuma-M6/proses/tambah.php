<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $kodeBuku = $_POST["kode-buku"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahunTerbit = $_POST["tahun-terbit"];
    $sampulBuku = $_FILES["sampul"]["name"];

    $sql = "insert into buku values('$kodeBuku', '$judul', '$penulis', '$tahunTerbit', '$sampulBuku')";

    if($koneksi->query($sql)=== TRUE){
        echo "Data buku berhasil ditambahkan";
        header("refresh: 3; ../index.php");
    }else{
        echo "Error" . $sql . "<br>" . $koneksi->error;
    }

}