<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_buku = $_POST["kode_buku"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $sampul_buku = isset($_FILES["sampul_buku"]["name"]) ? $_FILES["sampul_buku"]["name"] : "";

    if ($sampul_buku != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $sampul_buku); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['sampul_buku']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $sampul_buku; //menggabungkan angka acak dengan nama file sebenarnya
        
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, '../image/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            $query = "INSERT INTO buku (kode_buku, judul, penulis, tahun_terbit, sampul_buku) VALUES ('$kode_buku', '$judul', '$penulis', '$tahun_terbit', '$nama_gambar_baru')";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
            } else {
              //tampil alert dan akan redirect ke halaman index.php
              //silahkan ganti index.php sesuai halaman yang akan dituju
              echo "<script>alert('Data berhasil ditambah.');window.location='../index.php';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpeg atau png.');window.location='form-tambah-data.php';</script>";
        }
    } else {
        $query = "INSERT INTO buku (kode_buku, judul, penulis, tahun_terbit, sampul_buku) VALUES ('$kode_buku', '$judul', '$penulis', '$tahun_terbit', null)";
        $result = mysqli_query($koneksi, $query);

        // periksa query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='../index.php';</script>";
        }
    }

    
}
?>


