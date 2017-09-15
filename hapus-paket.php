<?php
include "koneksi.php";
$level = $_GET['level'];

$query = mysql_query("DELETE FROM tbl_paketlevel WHERE level='$level'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data-paket-level.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'data-paket-level.php'</script>";	
}
?>