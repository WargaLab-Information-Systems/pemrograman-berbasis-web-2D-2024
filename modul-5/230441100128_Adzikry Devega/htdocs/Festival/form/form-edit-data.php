<?php
  include "../proses/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    
</head>
<body>
    <div class="d-flex justify-content-center">

    <?php
    $id = $_GET["id"];

    $sql = "SELECT * FROM tb_artikel WHERE id = '$id'";

    $result = $koneksi->query($sql);

    ?>
     
        <form style="margin: 10px; width: 50%;" action="../proses/update.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="inputId" class="form-label">id</label>
                <input type="text" class="form-control" id="id" readonly name="id" value="<?php echo $row['id']?>">
            </div>
            <div class="mb-3">
                <label for="inputJudul_Utama" class="form-label">Judul Utama</label>
                <input type="text" class="form-control" id="inputJudulUtama" name="judul-utama" value="<?php echo $row['judul_utama']?>" required>
            </div>
            <div class="mb-3">
                <label for="inputJudul_Pratinjau" class="form-label">Judul Pratinjau</label>
                <input type="text" class="form-control" id="inputJudulPratinjau" name="judul-pratinjau" value="<?php echo $row['judul_pratinjau']?>" required>
            </div>
            <div class="mb-3">
                <label for="inputSub_Judul_Artikel_Satu" class="form-label">Sub Judul Artikel Satu</label>
                <input type="text" class="form-control" id="inputSubJudulArtikelSatu" name="sub-judul-artikel-satu" value="<?php echo $row['sub_judul_artikel_satu']?>" required>
            </div>
            </div>
            <div class="mb-3">
                <label for="inputSub_Judul_Artikel_Dua" class="form-label">Sub Judul Artikel Dua</label>
                <input type="text" class="form-control" id="inputSubJudulArtikelDua" name="sub-judul-artikel-dua" value="<?php echo $row['sub_judul_artikel_dua']?>" required>
            </div>
            </div>
            <div class="mb-3">
                <label for="inputLink_Pendukung" class="form-label">Link pendukung</label>
                <input type="text" class="form-control" id="inputLinkPendukung" name="link-pendukung" value="<?php echo $row['link_pendukung']?>" required>
            </div>
            </div>
            <div class="mb-3">
                <label for="inputFrasa_Kunci" class="form-label">Frasa Kunci</label>
                <input type="text" class="form-control" id="inputfrasaKunci" name="Frasa-Kunci" value="<?php echo $row['frasa_kunci']?>" required>
            </div>
            </div>
            <div class="mb-3">
                <label for="inputDeskripsi_Utama" class="form-label">Deskripsi Utama</label>
                <input type="text" class="form-control" id="inputDeskripsiUtama" name="Deskripsi-Utama" value="<?php echo $row['deskripsi-utama']?>" required>
            </div>
            </div>
            <div class="mb-3">
                <label for="inputSub_Deskripsi_Satu" class="form-label">Sub Deskripsi Satu</label>
                <input type="text" class="form-control" id="inputSubDeskripsiSatu" name="Sub-Deskripsi-Satu" value="<?php echo $row['sub_deskripsi_satu']?>" required>
            </div>
            <div class="mb-3">
                <label for="inputSub_Deskripsi_Dua" class="form-label">Sub Deskripsi Dua</label>
                <input type="text" class="form-control" id="inputSubDeskripsiDua" name="Sub-Deskripsi-Dua" value="<?php echo $row['sub_deskripsi_dua']?>" required>
            </div>
            <div class="mb-3">
                <label for="inputGambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="inputGambar" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
