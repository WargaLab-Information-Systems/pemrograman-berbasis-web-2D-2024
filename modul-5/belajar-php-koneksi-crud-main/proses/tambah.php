<?php
include "koneksi.php";

// Bagian ini mengecek apakah request yang diterima adalah POST. 
// Jika ya, maka proses di dalam blok ini akan dieksekusi.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mengambil data melalui metode post
    $kodeBuku = $_POST["kode-buku"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahunTerbit = $_POST["tahun_terbit"];

    // Penanganan pengunggahan file
    $uploadStatus = '';
    $fileName = '';
    $dest_path = '';
    // memeriksa apakah file tidak ada yg error
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'gif', 'png'); 
        if (in_array($fileExtension, $allowedfileExtensions)) {
            
            $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/belajar-php-koneksi-crud/uploaded_files/';
            $dest_path = $uploadFileDir . $fileName;

            

            if (is_writable($uploadFileDir)) {
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $uploadStatus = 'File berhasil diunggah.';
                } else {
                    $uploadStatus = 'Ada beberapa kesalahan saat memindahkan file ke direktori unggah. Harap pastikan direktori unggahan dapat ditulis oleh server web.';
                }
            } else {
                $uploadStatus = '';
            }
        } else {
            $uploadStatus = 'Gagal mengunggah. Jenis file yang diizinkan: ' . implode(',', $allowedfileExtensions);
        }
    } else {
        $uploadStatus = 'Tidak ada file yang diunggah atau terjadi kesalahan pengunggahan.';
    }

    echo $uploadStatus; // Tampilkan status unggahan

    // Periksa apakah kode_buku sudah ada
    $checkSql = "SELECT kode_buku FROM buku WHERE kode_buku = '$kodeBuku'";
    $result = $koneksi->query($checkSql);

    if ($result->num_rows > 0) {
        echo "Kesalahan: Entri duplikat untuk kode_buku.";
    } else {
        // Masukkan data buku ke dalam database
        $sql = "INSERT INTO buku (kode_buku, judul, penulis, tahun_terbit, file_name, file_path) VALUES ('$kodeBuku', '$judul', '$penulis', '$tahunTerbit', '$fileName', '$dest_path')";

        if ($koneksi->query($sql) === TRUE) {
            echo "Data berhasil dimasukkan.";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
}
?>