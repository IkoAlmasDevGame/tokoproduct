<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
include "../../../model/product/model.php";
?>

<link rel="stylesheet" href="../../../bootstrap/css/card-bootstrap.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

<h3 class="text-medium fw-bolder"><span class="glyphicon glyphicon-shopping-cart">
</span>  Data Pembelian Market</h3>
<button type='button' data-bs-toggle='modal' data-bs-target='#buymenu' class='btn btn-info'>
    <span class="glyphicon glyphicon-shopping-cart"></span></button>
<a href="#" class="btn glyphicon glyphicon-book text-medium"> Rekapitulasi</a>
<br>

<style type="text/css">
#wrap {
    position: relative;
    flex-flow: nowrap ;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    display: flex;
    
    max-width: 576px;
}
</style>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>

<?php 
$per_hal=4;
$jumlah_record=mysqli_query($con, "SELECT * from pembelian");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<div class='container-fluid'> 
    <?php 
        if(isset($_GET["pesan"])){
            if($_GET["pesan"] == "pembeli"){
                echo "<script>alert('terima kasih sudah membeli ...');</script>";
                echo "<p class='text-center text-5 fw-normal'><span class='glyphicon glyphicon-check'></span> Berhasil membeli</p>";
            }            
            echo "<script type='text/javascript'>window.setTimeout(() => {location.href='sale.php'}, 3000);</script>";
        }
    ?>
</div>
<div class="mb-1"></div>

<form method="GET">
    <div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang yang sudah dibeli di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>

<ul class="pagination">			
	<?php 
	    for($x=1;$x<=$halaman;$x++){
	?>
	<li><a href="?page=<?php echo $x ?>" style="margin-right: 2px;"><?php echo $x ?></a></li>
	<?php
		}
	?>						
</ul>
<div class="mb-1"></div>

<?php
if(isset($_GET['cari'])){
    $carinamabarang = mysqli_real_escape_string($con, $_GET["cari"]);
    $periksa = mysqli_query($con, "SELECT * FROM pembelian where namabarang like '$carinamabarang'");
}else{
    $periksa = mysqli_query($con, "SELECT * FROM pembelian limit $start, $per_hal");
}
while($p = mysqli_fetch_array($periksa)){
?>
<div class="col-md-3" id="wrap">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-5">Product Market</h3>
            <p class="card-text"><small class="text-muted"><?php echo date_create('now', timezone_open('Asia/Bangkok'))->format('Y-m-d H:i:s'); ?></small></p>
        </div>
            <div class="card-body">
                <p class="card-text">Nama Barang : <?php echo $p['namabarang'];?></p>
                <p class="card-text">Harga Barang : <?php echo "Rp. ".number_format($p['hargabarang']);?></p>
                <p class="card-text">Jumlah Beli : <?php echo $p["jumlahbeli"];?></p>
                <p class="card-text">Total Harga : <?php echo "Rp. ".number_format($p['total_harga']);?></p>
                <p class="card-text">Tanggal Pembelian : <?php echo $p['tanggal']?></p>
            </div>
        <div class="card-footer">
            <a href="#" class="btn glyphicon glyphicon-info-sign"> Detail</a>
            <a href="#" class="btn glyphicon glyphicon-trash"> Hapus</a>
        </div>
    </div>
</div>
<?php
}
?>
<div class="mb-1"></div>

<div class="modal" id="buymenu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-5">Data Menu Pembelian</h3>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../action/market/act_pembelian.php" method="post">
                    <div class="form-group">
                        <div class="mb-2">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                <input type="text" name="tanggal" class="form-control" id="datepicker" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fas fa-briefcase"></span></span>
                                <select name="namabarang" class="form-control select">
                                    <option>Pilih Data Menu Koperasi ...</option>
                                    <?php  
                                        $result = mysqli_query($con, "SELECT * FROM barang");
                                        while($row = $result->fetch_array()){
                                            $data = $row["namabarang"];
                                            ?>
                                                <option><?php echo $data;?></option>
                                            <?php
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fas fa-money-bill"></span></span>
                                <input type="text" name="hargabarang" class="form-control input" placeholder="masukkan harga satuan ..." autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fas fa-shopping-cart"></span></span>
                                <input type="text" name="jumlahbeli" class="form-control input" placeholder="masukkan jumlah beli ..." autocomplete="off">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-default" name="simpan" value="SELESAI">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
include "footer.php";
?>