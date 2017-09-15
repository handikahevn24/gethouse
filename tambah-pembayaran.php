<?php
session_start();
if (empty($_SESSION['username']))
    header('location:login.php');    
 include 'header.php'; ?>
<?php 
$tgl_sekarang = date('Y-m-d');
include("koneksi.php");


$query_pembayaran = mysql_query("SELECT * FROM tbl_pembayaran WHERE tgl_pembayaran = '$tgl_sekarang' ORDER BY no_kwitansi DESC") or die (mysql_error());
$row_pembayaran  = mysql_fetch_assoc($query_pembayaran);
$totalrow_pembayaran = mysql_num_rows($query_pembayaran);

?>

<?php
if ($totalrow_pembayaran > 0) {
	$nokwitansi_terakhir = substr($row_pembayaran['no_kwitansi'], -3);
	$nourut = $nokwitansi_terakhir+1;
	$thn = substr($tgl_sekarang,2,2);
	$bln=substr($tgl_sekarang,5,2);
	$tgl=substr($tgl_sekarang,-2);
	$isiNoKW ="PB.".$thn.$bln.$tgl."00".$nourut;
	}else if ($totalrow_pembayaran ==0){
	$nourut = 1;
	$thn=substr($tgl_sekarang,2,2);
	$bln=substr($tgl_sekarang,5,2);
	$tgl=substr($tgl_sekarang,-2);
	$isiNoKW ="PB.".$thn.$bln.$tgl."00".$nourut;
	
	}
?>


<body class="fade-out">
<div class="container ">
	<h2 class="text-center" style="margin-bottom: 25px;">Pembayaran</h2>
	<hr>
	<div class="keterangan">
		<h4>Keterangan</h4>
		<p id="p_status_pembayaran"></p>
	</div>
	<form action="proses-tambah-pembayaran.php" class="form-horizontal" method="POST">
		<div class="form-group">
			<label for="tanggal" class="control-label col-sm-2">Tanggal</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="tanggal" placeholder="Masukan Tanggal" name="tanggal" value="<?php echo $tgl_sekarang;?>" readonly>
			</div>
		</div>

		<div class="form-group">
			<label for="nokwitansi" class="control-label col-sm-2">No Kwitansi</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nokwitansi" placeholder="Masukan No Kwitansi" name="nokwitansi" value="<?php echo $isiNoKW;?>" readonly>
			</div>
		</div>

		<div class="form-group">
			<label for="no_induk" class="control-label col-sm-2">No Induk</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="no_induk" placeholder="Masukan No Induk" name="no_induk" onkeyup="isi_otomatis_siswa()">
			</div>
		</div>

		<div class="form-group">
			<label for="nama_siswa" class="control-label col-sm-2">Nama Siswa</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nama_siswa" placeholder="" name="nama_siswa" oninput="isi_otomatis_status()" readonly>
			</div>
		</div>

		<div class="form-group">
			<label for="level" class="control-label col-sm-2">Level</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="level" placeholder="" name="level" oninput="set()">
			</div>
		</div>

		<div class="form-group">
		<label for="biaya" class="control-label col-sm-2">Biaya</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="biaya" placeholder="" name="biaya" readonly="">
			</div>
		</div>

				<div class="form-group">
		<label for="biaya" class="control-label col-sm-2">Sisa Bayar</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="sisa" placeholder="" name="sisa" readonly>
			</div>
		</div>



		<div class="form-group">
		<label for="nominal" class="control-label col-sm-2">Nominal</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nominal" placeholder="" name="nominal">
			</div>
		</div>

<!--		<div class="form-group">
		<label for="angsuran" class="control-label col-sm-2">Angsuran</label>
			<div class="col-sm-5">
				<select name="angsuran" id="angsuran" class="form-control">
					<option value="Angsuran 1">Angsuran 1</option>
					<option value="Angsuran 2">Angsuran 2</option>
					<option value="Angsuran 3">Angsuran 3</option>
				</select>
			</div>
		</div>
-->
	<div class="form-group">
			<div class="col-sm-5">
				<input type="hidden" class="form-control" id="status_pembayaran" placeholder="" name="status_pembayaran">
			</div>
	</div>

		<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-5">
        <button type="submit" class="btn btn-info btn-block" name="simpan" value="simpan">Proses</button>
      </div>
    </div>
	</form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
			$(function() {
    $( "#no_induk" ).autocomplete({
        source: 'search.php'
    });
});

            function isi_otomatis_siswa(){
                var no_induk = $("#no_induk").val();
                $.ajax({
                    url: 'proses-ajax-siswa.php',
                    data: 'no_induk='+no_induk+'&level='+level,
                    cache: false,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama_siswa').val(obj.nama_siswa);
                    $('#level').val(obj.level);
                    $('#status_pembayaran').val(obj.status_pembayaran);
                   $('#biaya').val(obj.biaya);
                   $('#total').val(obj.total);
                   $('#sisa').val(obj.sisa);
                     
                });

                var sp = document.getElementById("status_pembayaran").value;
    			document.getElementById("p_status_pembayaran").innerHTML = "Status Pembayaran: " + sp;
            }

</script>
</body>