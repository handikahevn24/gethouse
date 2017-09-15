<?php
include("koneksi.php");

	$level = $_POST['level'];
	$nama_level = $_POST['nama_level'];
	$biaya = $_POST['biaya'];



$query = mysql_query("UPDATE tbl_paketlevel SET nama_level='$nama_level', biaya='$biaya' WHERE level='$level'")or die(mysql_error());
if ($query){
header('location:data-paket-level.php');	
} else {
	echo "gagal";
    }
?>