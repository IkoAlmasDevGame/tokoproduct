<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Indonesia Special</title>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrapv5221.css" type="text/css">
    <link rel="stylesheet" href="../../../bootstrap/css/text-bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../bootstrap/css/glyphicon.css" type="text/css">
    <link rel="stylesheet" href="../../../css/header-home.css" type="text/css">
    <link rel="icon" href="" type="">
    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../../bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <?php 
    session_start();
    include "../../log/logger.php";
    include "../../../database/Migrations/koneksi.php";

    if(isset($_GET['aksi'])){
        $aksi = $_GET['aksi'];
        if($aksi == "keluar"){
            if(isset($_SESSION['status'])){
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../index.php?pesan=keluar");
            exit;
        }
    }
    ?>
</head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="index.php" class="navbar-brand">Market Indonesia Special</a>
                                <button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                    <span class="sr-only">Toggle Navigation</span>
                                    <span class="icon-bar"></span>
					                <span class="icon-bar"></span>
					                <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#" id="pesan_sedia" data-bs-toggle="modal" data-bs-target="#modalpesan">
                                        <span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
                                    <li><a href="#" class="dropdown-toggle text-default" data-bs-toggle="dropdown" role="button">Hi, 
                                    <?php echo $_SESSION['namapegawai']; ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="modalpesan">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Pesan Notification</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    $periksa = mysqli_query($con, "SELECT * FROM barang WHERE jumlahbarang <= 0 and sisabarang <= 0");
                                    if($x = mysqli_fetch_array($periksa)){
                                        if($x['jumlah']<=0){
                                            if($x['sisa']<=0){
                                                echo "<div style='padding:5px' class='alert alert-warning'>
                                                <span class='glyphicon glyphicon-info-sign'></span> Stok  
                                                <a style='color:red'>". $x['namabarang']."</a> 
                                                sudah habis. silahkan di isi kembali product !!</div>";	
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
					                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>						
				                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" id="box">
                        <div class="row mb-1">
                            <div class="col-xs-9 mt-1">
                                <a class='img-thumbnail'>
                                    <img class='img-responsive' src='../../../image/profile/blank-profile.jpg'>
                                </a>
                            </div>
                            <div class="row"></div>
                            <ul class="nav nav-pills nav-stacked">
                                <li class="text-small-2"><a href="index.php" class="text-small-2 mb-2" id="active">
                                    <span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>
                                <li class="text-small-2"><a href="barang.php" class="text-small-2 mb-2" id="active">
                                    <span class="glyphicon glyphicon-briefcase"></span>  Data Inventory Market</a></li>
                                <li class="text-small-2"><a href="sale.php" class="text-small-2 mb-2" id="active">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>  Shop Market</a></li>
                                <li class="text-small-2"><a href="#" class="text-small-2 mb-2" id="active">
                                    <span class="glyphicon glyphicon-book"></span>  Rekapitulasi Market</a></li>
                                <li class="text-small-2"><a href="#" class="text-small-2 mb-2" id="active">
                                    <span class="glyphicon glyphicon-file"></span>  Data Pegawai</a></li>
                                <li class="text-small-2"><a href="#" class="text-small-2 mb-2" id="active">
                                    <span class="glyphicon glyphicon-user"></span>  Profile Pegawai</a></li>
                                <li class="text-small-2"><a href="#" class="text-small-2 mb-2" id="active">
                                    <span class="glyphicon glyphicon-lock"></span>  Change Password</a></li>
                                <li class="text-small-2"><a href="header.php?aksi=keluar" class="text-small-2 mb-2" id="active">
                                    <span class="glyphicon glyphicon-log-out"></span>  Log Out</a></li>
                            </ul>   
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <div class="col-md-10">