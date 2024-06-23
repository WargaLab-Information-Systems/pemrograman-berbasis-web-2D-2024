<?php
include "../proses/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <!---Bootstrap CSS--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center">
    <?php
    $kode_buku = $_GET["kode_buku"];
    $sql = "SELECT * FROM buku WHERE kode_buku = '$kode_buku'";
    $result = $koneksi->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    }
    ?>
        <form style="margin: 10px; width: 50%;" action="../proses/update.php" method="POST" enctype="multipart/form-data">
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
                <input type="number" class="form-control" id="inputTahunTerbit" name="tahun-terbit" value="<?php echo $row['tahun_terbit']?>">
            </div>
            <div class="mb-3">
                <label for="inputGambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="inputGambar" name="gambar">
                <input type="hidden" name="old-gambar" value="<?php echo $row['gambar']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>