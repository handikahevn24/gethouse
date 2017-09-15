
<?php 

if (isset($_GET['level'])) {
	# code...
	$level = $_GET['level'];
}

include 'header.php';
include("koneksi.php");


$query = mysql_query("SELECT * FROM tbl_paketlevel where level ='$level'")or die(mysql_error());
$dataedit = mysql_fetch_array($query);

?>
<body class="fade-out">
<div class="container ">
	<h2 class="text-center" style="margin-bottom: 25px;">Edit Paket Level</h2>
	<hr>
	<form action="proses-edit-level.php" class="form-horizontal" method="POST">
		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="level" class="control-label col-sm-2">Level</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="no_induk" placeholder="Masukan No level" name="level" value="<?php echo $dataedit['level'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="nama_level" class="control-label col-sm-2">Nama Level</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nama_level" placeholder="Masukan Nama Level" name="nama_level" value="<?php echo $dataedit['nama_level'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="biaya" class="control-label col-sm-2">Biaya</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="biaya" placeholder="Masukan Biaya" name="biaya" value="<?php echo $dataedit['biaya'];?>">
			</div>
		</div>

		<div class="form-group">  	      
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-info btn-block" name="simpan" value="simpan">Simpan</button>
      </div>
    </div>
	</form>
</div>
</body>