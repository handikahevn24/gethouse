<?php 
include 'header.php';
include ("koneksi.php");
?>
<body class="fade-out">

    <div class="container">
        <div class="row">
        <div class="col-md-3">
        <form action="detail-laporan-bulanan.php" class="form-horizontal" method="POST">
			<h1>PIlih Bulan</h1>
			<select name="bulan" class="form-control">
				<option value="01">Januari</option>
				<option value="02">Februari</option>
				<option value="03">Maret</option>
				<option value="04">April</option>
				<option value="05">Mei</option>
				<option value="06">Juni</option>
				<option value="07">Juli</option>
				<option value="08">Agustus</option>
				<option value="09">September</option>
				<option value="10">Oktober</option>
				<option value="12">November</option>
				<option value="12">Desember</option>
			</select>
			Tahun
			<select name="tahun" class="form-control">
			<?php
			$mulai= date('Y') - 50;
			for($i = $mulai;$i<$mulai + 100;$i++){
			    $sel = $i == date('Y') ? ' selected="selected"' : '';
			    echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
			}
			?>
			</select>            
			<button type="submit" class="btn btn-info btn-block" name="simpan" value="simpan">Proses</button>
		</form>
        </div>
    </div>
</body>
</html>