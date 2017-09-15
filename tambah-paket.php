<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:login.php');    
}
 include 'header.php';?>
<body class="fade-out">
<div class="container ">
	<h2 class="text-center" style="margin-bottom: 25px;">Tambah Paket</h2>
	<hr>
	<form action="proses-tambah-level.php" class="form-horizontal" method="POST">
		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="level" class="control-label col-sm-2">Level</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="level" placeholder="Masukan Level" name="level">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="nama_level" class="control-label col-sm-2">Nama Level</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nama_level" placeholder="Masukan Nama Level" name="nama_level">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<label for="biaya" class="control-label col-sm-2">Biaya</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="biaya" placeholder="Masukan Biaya" name="biaya">
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
</html>