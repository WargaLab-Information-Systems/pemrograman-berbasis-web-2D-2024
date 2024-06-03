<?php
include "koneksi.php";

// Ambil data yang dikirimkan oleh form-edit-data
$kode_buku = $_POST['kode-buku'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun_terbit = $_POST['tahun-terbit'];

// Inisialisasi variabel untuk gambar
$file_name = '';
$file_path = '';

// Jika ada file gambar yang diunggah
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $file_tmp_path = $_FILES['gambar']['tmp_name'];
    $file_name = $_FILES['gambar']['name'];
    $file_path = "../uploaded_files/" . $file_name;

    // Pindahkan file ke folder yang ditentukan
    if (move_uploaded_file($file_tmp_path, $file_path)) {
        // File berhasil diunggah
    } else {
        echo "Error mengunggah file gambar!";
        exit;
    }
}

// Query untuk mengubah data buku berdasarkan kode_buku
$sql = "UPDATE buku SET judul = '$judul', penulis = '$penulis', tahun_terbit = '$tahun_terbit'";

// Tambahkan bagian untuk mengupdate file gambar jika ada gambar baru yang diunggah
if (!empty($file_name)) {
    $sql .= ", file_name = '$file_name', file_path = '$file_path'";
}

$sql .= " WHERE kode_buku = '$kode_buku'";

if ($koneksi->query($sql) === TRUE) {
    echo "Data Buku Berhasil Diperbaharui";
    header("refresh:3; ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>
