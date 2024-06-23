<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeBuku = $_POST["kode-buku"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahunTerbit = $_POST["tahun-terbit"];
    $uploadOk = 1;
    $gambar = $_POST['old-gambar'];

    // Check if a new image is uploaded
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar = $_FILES['gambar']['name'];
        $target_dir = "../img/";
        $target_file = $target_dir . basename($gambar);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate image file
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check === false) {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Maaf, file sudah ada.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "Maaf, ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Maaf, file Anda tidak diupload.";
        } else {
            if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "Maaf, terjadi kesalahan saat mengupload file Anda.";
                $uploadOk = 0;
            }
        }
    }

    if ($uploadOk == 1) {
        if (!empty($gambar)) {
            $stmt = $koneksi->prepare("UPDATE buku SET gambar=?, judul=?, penulis=?, tahun_terbit=? WHERE kode_buku=?");
            $stmt->bind_param("sssss", $gambar, $judul, $penulis, $tahunTerbit, $kodeBuku);
        } else {
            $stmt = $koneksi->prepare("UPDATE buku SET judul=?, penulis=?, tahun_terbit=? WHERE kode_buku=?");
            $stmt->bind_param("ssss", $judul, $penulis, $tahunTerbit, $kodeBuku);
        }

        if ($stmt->execute() === TRUE) {
            echo "<script>alert('Data buku berhasil diperbarui.');window.location='../index.php';</script>";
        } else {
            echo "Kesalahan: " . $stmt->error;
        }

        $stmt->close();
    }

    $koneksi->close();
}
?>