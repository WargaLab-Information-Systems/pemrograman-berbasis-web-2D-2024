<?php
include "proses/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="mt-5 mx-auto col-11">
        <div class="w-full d-flex justify-content-end">
            <a href="form/form-tambah-data.html" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah
            </a>
        </div>
        <table class="mt-2 table table-striped">
            <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Judul Utama</th>
                  <th scope="col">Judul Pratinjau</th>
                  <th scope="col">Sub Judul Artikel Satu</th>
                  <th scope="col">Sub Judul Artikel Dua</th>
                  <th scope="col">Link Pendukung</th>
                  <th scope="col">Frasa Kunci</th>
                  <th scope="col">Deskripsi Utama</th>
                  <th scope="col">Sub Deskripsi Satu</th>
                  <th scope="col">Sub Deskripsi Dua</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM tb_artikel";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['judul_utama']."</td>";
                    echo "<td>".$row['judul_pratinjau']."</td>";
                    echo "<td>".$row['sub_judul_artikel_satu']."</td>";
                    echo "<td>".$row['sub_judul_artikel_dua']."</td>";
                    echo "<td>".$row['link_pendukung']."</td>";
                    echo "<td>".$row['frasa_kunci']."</td>";
                    echo "<td>".$row['deskripsi_utama']."</td>";
                    echo "<td>".$row['sub_deskripsi_satu']."</td>";
                    echo "<td>".$row['sub_deskripsi_dua']."</td>";
                    echo "<td>".$row['gambar']."</td>";
                    echo "<td>";
                    if (!empty($row['file_name'])) {
                      echo "<img src='/festival-koneksi-crud/uploaded_files/".$row['file_name']."' alt='Gambar' style='max-width: 100px; max-height: 100px;'>";
                    } else {
                      echo "No file";
                    }
                    echo "</td>";
                    echo "<td>";
                    // Tambahkan link edit dengan menyertakan parameter kode buku
                    echo "<a class='btn btn-sm btn-outline-warning' href='form/form-edit-data.php?id=" . $row["id"] . "'>";
                    echo "<i class='fas fa-pencil'></i> Edit </a>";
                    // Tombol hapus
                    echo "<a href='proses/delete.php?id=" . $row["id"] . "' class='btn btn-sm btn-outline-danger' onclick='return confirm(\"Are you sure you want to delete this item?\");'>";
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
