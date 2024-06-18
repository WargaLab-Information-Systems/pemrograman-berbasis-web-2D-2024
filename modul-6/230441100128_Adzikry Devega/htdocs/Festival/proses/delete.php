<?php

include "koneksi.php";

$id = $_GET["id"];

$sql = "SELECT file_path FROM tb_artikel WHERE id = '$id'";
$result = $koneksi->query($sql);


$sql = "DELETE FROM tb_artikel WHERE id = '$id'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data Berhasil Dihapus";
    header("refresh:3; ../index.php");
} else {
    echo "Error: " . $sql . "<br> <br> <hr>" . $koneksi->error;
}
?>