<? php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $judulUtama = $_POST["judul_utama"];
    $judulPratinjau = $_POST["judul_pratinjau"];
    $subJudulArtikelSatu = $_POST["sub_judul_artikel_satu"];
    $judulArtikelDua = $_POST["sub_judul_artikel_dua"];
    $linkPendukung = $_POST["link_pendukung"];
    $frasaKunci = $_POST["frasa_kunci"];
    $deskripsiUtama = $_POST["deskripsi_utama"];
    $subDeskripsiSatu = $_POST["sub_deskripsi_satu"];
    $subDeskripsiDua = $_POST["sub_deskripsi_dua"];
    $gambar = $_POST["gambar"];

    $sql = "INSERT INTO tb_artikel (id, judul_utama, judul_pratinjau, sub_judul_artikel_satu, sub_judul_artikel_dua, link_pendukung, frasa_kunci, deskripsi_utama, sub_deskripsi_satu, sub_deskripsi_dua, gambar ) VALUES ('$id','$judul_utama','$judul_pratinjau','$sub_judul_artikel_satu','$sub_judul_artikel_dua','$link_pendukung','$frasa_kunci','$deskripsi_utama','$sub_deskripsi_satu','$sub_deskripsi_dua','$gambar')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data Artikel  Berhasil Diperbarui."; // Add a success message here
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>