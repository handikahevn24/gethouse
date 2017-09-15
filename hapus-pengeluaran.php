<?php
include "koneksi.php";
$no_bktpengeluaran = $_GET['no_bktpengeluaran'];

$query = mysql_query("DELETE FROM tbl_pengeluaran WHERE no_bktpengeluaran='$no_bktpengeluaran'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'pengeluaran.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'pengeluaran.php'</script>";	
}
?>