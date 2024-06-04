<?php
include "proses/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="mt-5 mx-auto col-11">
        <div class="w-full d-flex justify-content-end">
            <a href="form/form-tambah-data.html" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah buku
            </a>
        </div>
        <table class="mt-2 table table-striped">
            <thead>
                <tr>
                  <th scope="col">Kode Buku</th>
                  <th scope="col">Judul Buku</th>
                  <th scope="col">Penulis</th>
                  <th scope="col">Tahun Terbit</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                // SQL query untuk mengambil semua data dari tabel 'buku'
                $sql = "SELECT * FROM buku";
                $result = $koneksi->query($sql);

                // Jika ada data, menggunakan while untuk menampilkan setiap baris data dalam tabel
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['kode_buku']."</td>";
                    echo "<td>".$row['judul']."</td>";
                    echo "<td>".$row['penulis']."</td>";
                    echo "<td>".$row['tahun_terbit']."</td>";
                    echo "<td>";
                    // untuk menampilkan gambar jika ada file yg di upload
                    if (!empty($row['file_name'])) {
                      echo "<img src='uploaded_files/".$row['file_name']."' alt='Gambar Buku' style='max-width: 100px; max-height: 100px;'>";
                    } else {
                      echo "No file";
                    }
                    echo "</td>";
                    echo "<td>"; 
                    // Tambahkan link edit dengan menyertakan parameter kode buku
                    echo "<a class='btn btn-sm btn-outline-warning' href='form/form-edit-data.php?kode_buku=" . $row["kode_buku"] . "'>";
                    echo "<i class='fas fa-pencil'></i> Edit </a>";
                    // Tombol hapus
                    echo "<a href='proses/delete.php?kode_buku=" . $row["kode_buku"] . "' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Are you sure you want to delete this item?\");'>";
                    echo "<i class='fas fa-trash'></i> Hapus </a>";
                    echo "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='6'>Data tidak ada....</td></tr>";
                }
                ?>
              </tbody>
        </table>
    </div>
</body>
</html>
