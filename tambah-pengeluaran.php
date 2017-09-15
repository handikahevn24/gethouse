<?php 
include 'header.php';
include("koneksi.php");
$tgl_sekarang = date('Y-m-d');

$query_pengeluaran = mysql_query("SELECT * FROM tbl_pengeluaran WHERE tgl = '$tgl_sekarang' ORDER BY no_bktpengeluaran DESC") or die (mysql_error());
$row_pengeluaran  = mysql_fetch_assoc($query_pengeluaran);
$totalrow_pengeluaran = mysql_num_rows($query_pengeluaran);

?>

<?php
if ($totalrow_pengeluaran > 0) {
	$nopengeluaran_terakhir = substr($row_pengeluaran['no_bktpengeluaran'], -3);
	$nourut = $nopengeluaran_terakhir+1;

	$thn = substr($tgl_sekarang,2,2);
	$bln=substr($tgl_sekarang,5,2);
	$tgl=substr($tgl_sekarang,-2);
	$isiNoPengeluaran ="PP.".$thn.$bln.$tgl."00".$nourut;
	}else if ($totalrow_pengeluaran ==0){
	$nourut = 1;
	$thn=substr($tgl_sekarang,2,2);
	$bln=substr($tgl_sekarang,5,2);
	$tgl=substr($tgl_sekarang,-2);
	$isiNoPengeluaran ="PP.".$thn.$bln.$tgl."00".$nourut;
	
	}
?>

<body class="fade-out">
<div class="container ">
	<h2 class="text-center" style="margin-bottom: 25px;">Tambah Pengeluaran</h2>
	<hr>
	<form action="proses-tambah-pengeluaran.php" class="form-horizontal" method="POST">
		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="level" class="control-label col-sm-2">Tanggal</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="tanggal" placeholder="Format Tanggal" name="tanggal" value="<?php echo $tgl_sekarang;?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="nama_level" class="control-label col-sm-2">No Bukti Pengeluaran</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="no_bp" placeholder="Masukan No. Bukti Pengeluaran" name="no_bp" value="<?php echo $isiNoPengeluaran;?>" readonly>
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
				<input type="text" class="form-control" id="rincian" placeholder="Masukan rincian pengeluaran" name="rincian">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="biaya" class="control-label col-sm-2">Item</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="item" placeholder="Masukan jumlah item" name="item">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="biaya" class="control-label col-sm-2">Nominal</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nominal" placeholder="Masukan Nominal" name="nominal" oninput="myFunction()">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="total" class="control-label col-sm-2">Total</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="total" placeholder="" name="total">
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