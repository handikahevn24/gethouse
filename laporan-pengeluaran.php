<?php 
include 'header.php';
include ("koneksi.php");
?>
<body class="fade-out">

    <div class="container">
        <div class="row">
        <div class="col-md-3">
        <form action="detail-laporan-pengeluaran.php" class="form-horizontal" method="POST">
			<h1>Laporan Per Rekening</h1>
			<select class="form-control" name="rek" id="rek">
			<option>Pilih</option>
		<?php
        	$sql = mysql_query("SELECT * FROM tbl_rekpengeluaran ORDER BY rek ASC");
                if(mysql_num_rows($sql) != 0){
                    while($data = mysql_fetch_assoc($sql)){
                         echo '<option value='.$data['rek'].'>'.$data['keterangan'].'</option>'; }
                                    }
                                    ?>
  			</select>        
			<button type="submit" class="btn btn-info btn-block" name="simpan" value="simpan">Proses</button>
		</form>
        </div>
        <div class="col-md-3">
            <h1>Laporan Keseluruhan</h1>
                <a href="laporan-pengeluaran-global.php"><button style="margin-top: 17%;" class="btn btn-success btn-block">Lihat Laporan</button></a>
            
        </div>
    </div>
</body>
</html>