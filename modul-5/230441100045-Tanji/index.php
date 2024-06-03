<?php
  include "proses/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!---Bootstrap CSS--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="mt-5 mx-auto col-11">
        <div class="w-full d-flex justify-content-end">
            <a href="form/form-tambah-data.php" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah buku
            </a>
        </div>
        <table class="mt-2 table table-striped">
            <thead>
                <tr>
                <th scope="col">gambar</th>
                  <th scope="col">Kode Buku</th>
                  <th scope="col">Judul Buku</th>
                  <th scope="col">Penulis</th>
                  <th scope="col">Tahun Terbit</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                
                $sql = "SELECT * from buku";
                $result = $koneksi->query($sql); 

                if ($result->num_rows > 0){
                  while ($row = $result->fetch_assoc()) {

                ?>    
                  <tr class="align-middle">
                    <td> <img src="img/<?= $row['gambar'] ?>" alt='Gambar buku'  class='rounded' width="100px"></td>
                    <td> <?php echo $row['kode_buku'];?></td>
                    <td> <?php echo $row['judul'];?></td>
                    <td> <?php echo $row['penulis'];?></td>
                    <td> <?php echo $row['tahun_terbit'];?></td>
                    <td>
                      <a class='btn btn-sm btn-outline-warning' href="form/form-edit-data.php?kode_buku=<?php echo $row['kode_buku']; ?>">
                      <i class='fas fa-pencil'></i> Edit </a>
                      <a href="proses/delete.php?kode_buku= <?php echo $row['kode_buku'];?>" class='btn btn-sm btn-outline-danger'>
                      <i class='fas fa-trash'></i> Hapus </a>
                    </td>
                  </tr>
                <?php
                  }
                }else{
                  echo "Data tidak ada....";
                }


                ?>                
                
              </tbody>
        </table>
    </div>
</body>
</html>