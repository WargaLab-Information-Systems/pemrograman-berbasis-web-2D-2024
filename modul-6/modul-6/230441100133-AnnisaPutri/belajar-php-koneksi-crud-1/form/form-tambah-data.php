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
        <form style="margin: 10px; width: 50%;" action="../proses/tambah.php" method="POST" enctype="multipart/form-data"> 
            <div class="mb-3">
                <label for="inputCatalog" class="form-label">Kode Buku</label>
                <input type="text" class="form-control" name="kode_buku" id="inputCatalog">
            </div>
            <div class="mb-3">
                <label for="inputJudul" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="judul" id="inputJudul">
            </div>
            <div class="mb-3">
                <label for="inputPenulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" name="penulis" id="inputPenulis">
            </div>
            <div class="mb-3">
                <label for="inputTahunTerbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" name="tahun_terbit" id="inputTahunTerbit">
            </div>
            <div class="mb-3">
                <label for="SampulBuku" class="form-label">Buku</label>
                <input type="file" class="form-control" name="sampul_buku" id="SampulBuku">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    
</body>
</html>