<?php
include "koneksi.php";

$kode_buku = $_GET['kode_buku'];
$sql = "SELECT * FROM buku WHERE kode_buku='$kode_buku'";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Buku</h2>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="kode_buku" value="<?php echo $row['kode_buku']; ?>">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
            </div>
            <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $row['penulis']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cover_buku" class="form-label">Cover Buku</label>
                <input type="file" class="form-control" id="cover_buku" name="cover_buku">
                <img src="covers/<?php echo $row['cover_buku']; ?>" style="max-width: 100px; max-height: 100px;" alt="Cover Buku">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>


