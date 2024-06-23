<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodeBuku = $_POST["kode-buku"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahunTerbit = $_POST["tahun-terbit"];

    // Pastikan file gambar diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar = $_FILES['gambar']['name'];
        $target_dir = "../img/";
        $target_file = $target_dir . basename($gambar);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Periksa apakah file gambar adalah gambar asli atau bukan
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Periksa apakah file sudah ada
        if (file_exists($target_file)) {
            echo "Maaf, file sudah ada.";
            $uploadOk = 0;
        }

        // Periksa ukuran file
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "Maaf, ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        // Hanya memperbolehkan format file tertentu
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Periksa jika $uploadOk diatur ke 0 karena kesalahan
        if ($uploadOk == 0) {
            echo "Maaf, file Anda tidak diupload.";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                // Persiapkan statement untuk mencegah SQL injection
                $stmt = $koneksi->prepare("INSERT INTO buku (kode_buku, gambar, judul, penulis, tahun_terbit) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $kodeBuku, $gambar, $judul, $penulis, $tahunTerbit);
                if ($stmt->execute() === TRUE) {
                    echo "<script>alert('Data buku berhasil ditambahkan.');window.location='../index.php';</script>";
                } else {
                    echo "Kesalahan: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Maaf, terjadi kesalahan saat mengupload file Anda.";
            }
        }
    } else {
        echo "Maaf, tidak ada file yang diunggah.";
    }

    $koneksi->close();
}
?>
