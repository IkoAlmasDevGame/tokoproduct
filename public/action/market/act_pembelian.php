<?php
include "../../../database/Migrations/koneksi.php";
if(isset($_POST['simpan'])){
    $tgl=$_POST['tanggal'];
    $nama=$_POST['namabarang'];
    $harga=$_POST['hargabarang'];
    $jumbel=$_POST['jumlahbeli'];
                            
    $dt=mysqli_query($con,"select * from barang where namabarang='$nama'");
    $data=mysqli_fetch_array($dt);
    $sisaa=$data['jumlahbarang']-$jumbel;
    mysqli_query($con, "UPDATE barang SET jumlahbarang='$sisaa', sisabarang='$sisaa' WHERE namabarang='$nama'");
                            
    $laba=$harga;
    $labaa=$laba*$jumbel;
    $total_harga=$harga*$jumbel;
    mysqli_query($con,"insert into pembelian values('','$tgl','$nama','$harga','$jumbel','$total_harga','$labaa')");
    header("location:../../view/market/sale.php?pesan=pembeli");
    }
?>