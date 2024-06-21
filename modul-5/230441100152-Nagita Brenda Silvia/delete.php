<?php
include "koneksi.php";

$kode_buku = $_GET['kode_buku'];

$sql = "DELETE FROM buku WHERE kode_buku='$kode_buku'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data buku berhasil dihapus";
    header("refresh: 3; url=index.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>
