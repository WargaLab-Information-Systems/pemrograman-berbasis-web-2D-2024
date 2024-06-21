<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // var_dump($_FILES["gambar"]);die;
    if($_FILES["gambar"]["error"]==4){
        echo "File belum ditambahkan";
        header("refresh:3; ../index.php");
    }

    $fileGambar = $_FILES["gambar"]["name"];
    // var_dump($fileGambar);die;
    $kodeBuku = $_POST["kode-buku"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahunTerbit = $_POST["tahun-terbit"];

    move_uploaded_file($_FILES["gambar"]["tmp_name"], "../gambar/" .$fileGambar);

    $sql = "insert into buku values('$kodeBuku', '$judul', '$penulis', '$tahunTerbit', '$fileGambar')";

    if($koneksi->query($sql)=== TRUE){
        echo "Data buku berhasil ditambahkan";
        header("refresh: 3; ../index.php");
    }else{
        echo "Error" . $sql . "<br>" . $koneksi->error;
    }

}