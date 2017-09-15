
<?php 

if (isset($_GET['no_induk'])) {
	# code...
	$no_induk = $_GET['no_induk'];
}

include 'header.php';
include("koneksi.php");


$query = mysql_query("SELECT * FROM tbl_siswa where no_induk ='$no_induk'")or die(mysql_error());
$dataedit = mysql_fetch_array($query);

?>
<body class="fade-out">
<div class="container ">
	<h2 class="text-center" style="margin-bottom: 25px;">Edit Siswa</h2>
	<hr>
	<form action="proses-edit-siswa.php" class="form-horizontal" method="POST">
		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="no_induk" class="control-label col-sm-2">No Induk</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="no_induk" placeholder="Masukan No Induk" name="no_induk" value="<?php echo $dataedit['no_induk'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="nama" class="control-label col-sm-2">Nama</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nama" placeholder="Masukan Nama" name="nama" value="<?php echo $dataedit['nama_siswa'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="jk" class="control-label col-sm-2">Jenis Kelamin</label>
			<div class="col-sm-5">
			<select class="form-control" name="jk">
  				<option value="Laki - Laki" <?php if ($dataedit['jk'] == 'Laki - Laki') {
  					echo 'selected';}?>>Laki - Laki</option>
  				<option value="Perempuan" <?php if ($dataedit['jk'] == 'Perempuan') {
  					echo 'selected';}?>>Perempuan</option>
  			</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="kelas" class="control-label col-sm-2">Kelas</label>
			<div class="col-sm-5">
				<select class="form-control" name="level">
					<?php
        	$sql = mysql_query("SELECT * FROM tbl_paketlevel ORDER BY level ASC");
                if(mysql_num_rows($sql) != 0){
                    while($data = mysql_fetch_assoc($sql)){
                         echo '<option value='.$data['level'].'>'.$data['level'].'</option>'; }
                                    }
                                    ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="sekolah_asal" class="control-label col-sm-2">Sekolah Asal</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="sekolah_asal" placeholder="Masukan No Induk" name="sekolah_asal" value="<?php echo $dataedit['sekolah_asal'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="tempat_lahir" class="control-label col-sm-2">Tempat Lahir</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="tempat_lahir" placeholder="Masukan tempat_lahir" name="tempat_lahir" value="<?php echo $dataedit['tempat_lahir'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="tanggal_lahir" class="control-label col-sm-2">Tanggal Lahir</label>
			<div class="col-sm-5">
				<input type="date" class="form-control" id="tanggal_lahir" placeholder="Format Penulisan YYYY/MM/DD" name="tanggal_lahir" value="<?php echo $dataedit['tgl_lahir'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="alamat" class="control-label col-sm-2">Alamat</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat" name="alamat" value="<?php echo $dataedit['alamat'];?>">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="no_telepon" class="control-label col-sm-2">No Telepon</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="no_telepon" placeholder="Masukan No Telepon" name="no_telepon" value="<?php echo $dataedit['no_telp'];?>">
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