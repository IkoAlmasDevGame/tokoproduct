<?php 
include "../../../database/Migrations/koneksi.php";
if(isset($_POST["simpan"])){
    $namabarang = $_POST["namabarang"];
    $kdjenis = $_POST["kd_jenis"];
    $hargabarang = $_POST["hargabarang"];
    $jumlahbarang = $_POST["jumlahbarang"];
    $sisabarang = $_POST["sisabarang"];

    mysqli_query($con, "INSERT INTO barang VALUES ('','$namabarang','$kdjenis','$hargabarang','$jumlahbarang','$sisabarang')");
    header("location:../../view/market/barang.php?pesan=penambahan");
}
?>