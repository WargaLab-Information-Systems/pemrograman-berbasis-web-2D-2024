<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="mt-5 mx-auto col-11">
        <div class="w-full d-flex justify-content-end">
            <a href="form-tambah-data.php" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah buku
            </a>
        </div>
        <table class="mt-2 table table-striped">
            <thead>
                <tr>
                  <th scope="col">Kode Buku</th>
                  <th scope="col">Judul Buku</th>
                  <th scope="col">Penulis</th>
                  <th scope="col">Tahun Terbit</th>
                  <th scope="col">Cover Buku</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM buku";
                $result = $koneksi->query($sql); 

                if ($result->num_rows > 0){
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['kode_buku']."</td>";
                    echo "<td>".$row['judul']."</td>";
                    echo "<td>".$row['penulis']."</td>";
                    echo "<td>".$row['tahun_terbit']."</td>";
                    echo "<td><img src='covers/" . $row['cover_buku'] . "' style='max-width: 100px; max-height: 100px;'></td>";
                    echo "<td>";
                    echo "<a class='btn btn-sm btn-outline-warning' href='form-edit-data.php?kode_buku=" . $row["kode_buku"] . "'><i class='fas fa-pencil'></i> Edit</a> ";
                    echo "<a href='delete.php?kode_buku=" . $row["kode_buku"] . "' class='btn btn-sm btn-outline-danger'><i class='fas fa-trash'></i> Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                  }
                }else{
                  echo "<tr><td colspan='6'>Data tidak ada....</td></tr>";
                }
                ?>                
              </tbody>
        </table>
    </div>
</body>
</html>
