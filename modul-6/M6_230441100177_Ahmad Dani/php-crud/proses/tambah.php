<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Cek gambar sudah diupload apa belum 
    if ($_FILES['gambar']['error'] == 4) {
        echo "File belum diupload";
        header("refresh: 3; ../index.php");
        die;
    }

    $fileName = $_FILES['gambar']['name'];
    $kodeBuku = $_POST["kode-buku"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahunTerbit = $_POST["tahun-terbit"];

    move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/' . $fileName);

    $sql = "insert into buku values('$kodeBuku', '$judul', '$penulis', '$tahunTerbit', '$fileName')";

    if($koneksi->query($sql)=== TRUE){
        echo "Data buku berhasil ditambahkan";
        header("refresh: 3; ../index.php");
    }else{
        echo "Error" . $sql . "<br>" . $koneksi->error;
    }

}