<?php
include "koneksi.php";
$no_kwitansi = $_GET['no_kwitansi'];

$query = mysql_query("DELETE FROM tbl_pembayaran WHERE no_kwitansi='$no_kwitansi'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'pembayaran.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'pembayaran.php'</script>";	
}
?>