<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeBuku = $_POST["kode_buku"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahunTerbit = $_POST["tahun_terbit"];

    if (!empty($_FILES["cover_buku"]["name"])) {
        $cover = $_FILES["cover_buku"]["name"];
        $target_dir = "covers/";
        $target_file = $target_dir . basename($_FILES["cover_buku"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "File yang diperbolehkan hanya bertipe: JPG, JPEG, & PNG";
        } else {
            if (move_uploaded_file($_FILES["cover_buku"]["tmp_name"], $target_file)) {
                $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahunTerbit', cover_buku='$cover' WHERE kode_buku='$kodeBuku'";
            } else {
                echo "Terjadi kesalahan saat mengunggah file.";
                exit;
            }
        }
    } else {
        $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahunTerbit' WHERE kode_buku='$kodeBuku'";
    }

    if ($koneksi->query($sql) === TRUE) {
        echo "Data buku berhasil diupdate";
        header("refresh: 3; url=index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>
