<?php
include "koneksi.php";

$id = $_POST['id'];
$judul_pratinjau = $_POST['judul-utama'];
$judulUtama = $_POST["judul_utama"];
$judulPratinjau = $_POST["judul_pratinjau"];
$subJudulArtikelSatu = $_POST["sub_judul_artikel_satu"];
$judulArtikelDua = $_POST["sub_judul_artikel_dua"];
$linkPendukung = $_POST["link_pendukung"];
$frasaKunci = $_POST["frasa_kunci"];
$deskripsiUtama = $_POST["deskripsi_utama"];
$subDeskripsiSatu = $_POST["sub_deskripsi_satu"];
$subDeskripsiDua = $_POST["sub_deskripsi_dua"];
$gambar = $_POST["gambar"];$penulis = $_POST['gambar'];


$sql = "UPDATE tb_ SET id = '$id',judul_utama = '$judul_utama', judul_pratinjau='$judul_pratinjau', sub_judul_artikel_satu ='$sub_judul_artikel_satu', sub_judul_artikel_dua ='$sub_judul_artikel_dua', link_pendukung = '$link_pendukung', frasa_kunci = '$frasa_kunci', deskripsi_utama='$deskripsi_utama', sub_deskripsi_satu='$sub_deskripsi_satu', sub_deskripsi_dua='$sub_deskripsi_dua', gambar='$gambar'";


if ($koneksi->query($sql) === TRUE) {
    echo "Data Berhasil Diupdate";
    header("refresh:3; ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>
