<?php
include "koneksi.php";
$no_induk = $_GET['no_induk'];

$query = mysql_query("DELETE FROM tbl_siswa WHERE no_induk='$no_induk'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'data-siswa.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'data-siswa.php'</script>";	
}
?>