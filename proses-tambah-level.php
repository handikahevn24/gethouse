<?php

if (isset($_POST['simpan'])) {

	include("koneksi.php");



$level = $_POST['level'];
$nama_level = $_POST['nama_level'];
$biaya =  $_POST['biaya'];

$q = mysql_query("INSERT INTO tbl_paketlevel (level, nama_level, biaya) VALUES (
	'$level', '$nama_level', '$biaya')");
echo $q;

if ($q){
	echo "<script>alert('Data Berhasil Dimasukan'); window.location = 'data-paket-level.php'</script>";
} else {
	echo "<script>alert('Data Gagal Disimpan'); window.location = 'data-paket-level.php'</script>";
}
	# code...
}

?>
