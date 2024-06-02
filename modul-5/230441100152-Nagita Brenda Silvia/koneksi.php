<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "db_buku";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
