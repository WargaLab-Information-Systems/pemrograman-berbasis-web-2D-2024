<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $kodeBuku =$_POST["kode-buku"];
    $judul=$_POST["kode-buku"];
    $penulis=$_POST ["penulis"];
    $tahunTerbit = $_POST["tahun-terbit"];


    echo "Kode Buku: ".$kodeBuku ."<br>";
    echo "Judul: ".$judul ."<br>";
    echo "Penulis: ".$penulis ."<br>";
    echo "Tahun Terbit: ".$tahunTerbit ."<br>";
}