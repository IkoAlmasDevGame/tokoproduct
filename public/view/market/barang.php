<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
include "../../../model/product/model.php";
?>

<link rel="stylesheet" href="../../../css/barang.css" type="text/css" crossorigin="anonymous">
<h3 class='modal-title'><span class='glyphicon glyphicon-briefcase'></span> Data Barang</h3>
<button type='button' data-bs-toggle='modal' data-bs-target='#barang' class='btn btn-info'>
    <span class="glyphicon glyphicon-plus"></span> Tambah Data Barang</button>
<div class="mb-1"></div>

<div class='container'> 
    <?php 
        if(isset($_GET["pesan"])){
            if($_GET["pesan"] == "penambahan"){
                echo "<p class='text-center text-small-3 fw-normal'><span class='glyphicon glyphicon-check'></span> Berhasil nambah data</p>";
            }else if($_GET["pesan"] == "pengeditan"){
                echo "<p class='text-center text-small-3 fw-normal'><span class='glyphicon glyphicon-edit'></span> Berhasil Edit Data</p>";
            }else if($_GET["pesan"] == "penghapus"){
                echo "<p class='text-center text-small-3 fw-normal'><span class='glyphicon glyphicon-trash'></span> Berhasil Delete Data</p>";
            }            
            echo "<script type='text/javascript'>window.setTimeout(() => {location.href='barang.php'}, 3000);</script>";
        }
    ?>
</div>

<?php 
$per_hal=5;
$jumlah_record=mysqli_query($con,"SELECT * from barang");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<div id="wraps">
	<span>
		<span>Jumlah Record :</span>		
		<span><?php echo $jum; ?></span>
    </span>
    <span>
		<span>Jumlah Halaman :</span>	
		<span><?php echo $halaman; ?></span>
    </span>
</div>

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
echo "Data masuknya barang : ".mysqli_num_rows(mysqli_query($con, "SELECT * FROM barang order by namabarang asc"));
echo "<div class='mb-1'></div>";        
?>

<form method="GET">
    <div class="input-group col-md-4 col-md-offset-0">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang ..." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<div class="mb-2"></div>

<table class="table table-bordered">
    <tr>
        <th class="text-center text-small-3">No</th>
        <th class="text-center text-small-3">Nama Barang</th>
        <th class="text-center text-small-3">Jenis Barang</th>
        <th class="text-center text-small-3">Harga Barang</th>
        <th class="text-center text-small-3">Jumlah Barang</th>
        <th class="text-center text-small-3">Sisa Barang</th>
        <th class="text-center text-small-3">Opsional</th>
    </tr>
    <?php 
    if(isset($_GET["cari"])){
        $caribarang = mysqli_real_escape_string($con, $_GET["cari"]);
        $scaribarang = mysqli_query($con, "SELECT * FROM barang WHERE namabarang like '$caribarang'");
    }else{
        $scaribarang = mysqli_query($con, "SELECT * FROM barang limit $start, $per_hal");        
    }
    $no = 1;
    while($sc = mysqli_fetch_array($scaribarang)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td class="text-small-3"><?php echo $sc["namabarang"]; ?></td>
            <td><?php echo jnsbrg($sc["kd_jenis"]); ?></td>
            <td><?php echo "Rp. ".number_format($sc["hargabarang"]); ?></td>
            <td class="text-center"><?php echo $sc["jumlahbarang"]; ?></td>
            <td class="text-center"><?php echo $sc["sisabarang"]; ?></td>
            <td id="wrap">
                <a href="#" class="btn text-small-2"> Detail Barang</a>
                <a href="#" class="btn text-small-2"> Edit Barang</a>
                <a href="#" class="btn text-small-2"> Delete Barang</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<div class="modal" id="barang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-medium">Penambahan Data Barang</h3>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../action/market/act_barang.php" method="post">
                    <div class="form-group">
                        <div class="mb-1">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
                                <input type="text" name="namabarang" class="form-control input" 
                                placeholder="masukkan nama barang yang ingin di input ..." required>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-list"></span></span>
                                <select name="kd_jenis" class="form-control select">
                                    <option>Pilih Jenis Barang</option>
                                    <?php 
                                        $sJenis = mysqli_query($con, "SELECT * FROM jenisbarang");
                                        while($sj = mysqli_fetch_array($sJenis)){
                                            ?>
                                                <option value="<?php echo $sj["kd_jenis"];?>"><?php echo $sj["jenis"]; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
                                <input type="text" name="hargabarang" class="form-control input" 
                                placeholder="masukkan harga barang ..." required>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
                                <input type="text" name="jumlahbarang" class="form-control input" placeholder="jumlah barang ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="input-group">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal" style="color:black;">Batal</button>
                            <button type="submit" class="btn btn-default" name="simpan" style="color:black;">SELESAI</button>
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