<?php
  include "../proses/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!---Bootstrap CSS--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center ">

    <?php
    $kode_buku = $_GET["kode_buku"];

    // memanggil data dalam tabel buku dengan kode buku yang sudah di didapatkan menggunakan GET
    $sql = "SELECT * FROM buku WHERE kode_buku = '$kode_buku'";

    $result = $koneksi->query($sql);

    // hasil query yang sudah dijalankan akan disimpan ke dalam variabel row
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    }
    
    ?>
        <!-- KITA REALISASIKAN HASIL DARI QUERY SELECT YANG SUDAH DIDAPATKAN KE SETIAP TAG INPUT DENGAN DIMASUKKAN DALAM ATRIBUT VALUE -->

        <!-- KENAPA KOK DIKASIH VALUE DAN MEMANGGIL DATA NYA?
        KARENA KITA MENGINGINKAN DATA YANG AKAN KITA EDIT UNTUK TAMPIL KE DALAM FORM -->

        <!-- Menambahkan action dan method yang dipakai pada tag from -->
        <!-- Serta Menambahkan name input pada setiap tag input seperti pada file form-tambah-data.php -->
        <form style="margin: 10px; width: 50%;" action="../proses/update.php" method="POST">
            
            <!-- kode buku di-disable karena kode buku tidak boleh diubah, dengan cara di sembunyikan menggunakan read only -->
            <input type="text" class="form-control" id="inputCatalog" readonly name="kode-buku" value="<?php echo $row['kode_buku']?>">
            
            <div class="mb-3">
                <label for="inputJudul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="inputJudul" name="judul" value="<?php echo $row['judul']?>">
            </div>
            <div class="mb-3">
                <label for="inputPenulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="inputPenulis" name="penulis" value="<?php echo $row['penulis']?>">
            </div>
            <div class="mb-3">
                <label for="inputTahunTerbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="inputTahunTerbit" name="tahun-terbit" value="<?php echo $row['tahun_terbit']?>" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    
</body>
</html>