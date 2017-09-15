<?php 

if (isset($_GET['no_bktpengeluaran'])) {
	# code...
	$no_bktpengeluaran = $_GET['no_bktpengeluaran'];
}

include 'header.php';
include("koneksi.php");

$query = mysql_query("SELECT * FROM tbl_pengeluaran where no_bktpengeluaran ='$no_bktpengeluaran'")or die(mysql_error());
$dataedit = mysql_fetch_array($query);
$nominal = $dataedit['total'] / $dataedit['item'];


?>

<body class="fade-out">
<div class="container ">
	<h2 class="text-center" style="margin-bottom: 25px;">Edit Pengeluaran</h2>
	<hr>
	<form action="proses-edit-pengeluaran.php" class="form-horizontal" method="POST">
		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="level" class="control-label col-sm-2">Tanggal</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="tanggal" placeholder="Format Tanggal" name="tanggal" value="<?php echo $dataedit['tgl'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="nama_level" class="control-label col-sm-2">No Bukti Pengeluaran</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="no_bp" placeholder="Masukan No. Bukti Pengeluaran" name="no_bp" value="<?php echo $dataedit['no_bktpengeluaran'];?>" readonly>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="biaya" class="control-label col-sm-2">Keterangan</label>
			<div class="col-sm-5">
			<select class="form-control" name="keterangan" id="keterangan">
			<option>Pilih</option>
		<?php
        	$sql = mysql_query("SELECT * FROM tbl_rekpengeluaran ORDER BY rek ASC");
                if(mysql_num_rows($sql) != 0){
                    while($data = mysql_fetch_assoc($sql)){
                         echo '<option value='.$data['rek'].'>'.$data['keterangan'].'</option>'; }
                                    }
                                    ?>
  			</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="biaya" class="control-label col-sm-2">Rincian</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="rincian" placeholder="Masukan rincian pengeluaran" name="rincian" value="<?php echo $dataedit['rincian'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="biaya" class="control-label col-sm-2">Item</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="item" placeholder="Masukan jumlah item" name="item" value="<?php echo $dataedit['item'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="biaya" class="control-label col-sm-2">Nominal</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nominal" placeholder="Masukan Nominal" name="nominal" oninput="myFunction()" value="<?php echo $nominal;?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="total" class="control-label col-sm-2">Total</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="total" placeholder="" name="total" value="<?php echo $dataedit['total'];?>">
			</div>
		</div>

		<div class="form-group">        
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-info btn-block" name="simpan">Simpan</button>
      </div>
    </div>
<p id="demo"></p>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function myFunction() {
	var w = document.getElementById("item").value;
    var x = document.getElementById("nominal").value;
    var z = w * x;
    document.getElementById("total").value = z;
}
</script>
</body>
</html>