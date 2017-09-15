<?php
include 'koneksi.php';
$no_induk = $_GET['no_induk'];

$sisapembayaran = mysql_query("SELECT *, SUM(tbl_pembayaran.nominal) as total FROM tbl_pembayaran, tbl_paketlevel where no_induk='$no_induk' and tbl_paketlevel.level = tbl_pembayaran.level");
$caritotal = mysql_fetch_array($sisapembayaran);

$query = mysql_query("SELECT * from tbl_siswa,tbl_paketlevel where no_induk='$no_induk' and tbl_siswa.level = tbl_paketlevel.level");

$querypmb = mysql_query("SELECT * FROM tbl_pembayaran where no_induk='$no_induk' order by no_kwitansi desc");
$siswa = mysql_fetch_array($query);
$pembayaran = mysql_fetch_array($querypmb);

if (mysql_num_rows($sisapembayaran)==0) {
	$sisa = $siswa['biaya'];
}else {
	$sisa = $siswa['biaya']-$caritotal['total'];
}

if (empty($pembayaran['status_pembayaran'])) {
	$Status = "Angsuran 1";
}else if ($sisa == 0) {
	$Status = "Lunas";
}else if ($pembayaran['status_pembayaran'] == "") {
	# code...
	$Status = "Angsuran 1";
} else if ($pembayaran['status_pembayaran'] == "Angsuran 1") {
	# code...
	$Status = "Angsuran 2";

}else if ($pembayaran['status_pembayaran'] == "Angsuran 2") {
	# code...
	$Status = "Angsuran 3";

}else {
	$Status = "Lunas";
}


//if(substr($pembayaran['status_pembayaran'],-1)==0 or substr($pembayaran['status_pembayaran'],-1)=="")
//	{
//	 $Status="Angsuran 1";
//	}else if(substr($pembayaran['status_pembayaran'],-1)==1) {
//				$Status="Angsuran 2";
			
//				}else if(substr($pembayaran['status_pembayaran'],-1)==2)  {
//				$Status="Angsuran 3";
			
//				}else {
//					$Status="Lunas";
//					}

$data = array(
            'nama_siswa'      =>  $siswa['nama_siswa'],
            'status_pembayaran'      =>  $Status,
            'sisa' => $sisa,
            'biaya' => $siswa['biaya'],
            'level'   =>  $siswa['level'],);
			
			
 echo json_encode($data);

?>