<?php

if (isset($_POST['simpan'])) {


	include("koneksi.php");

$no_bp = $_POST['no_bp'];
$tgl = $_POST['tanggal'];
$rek = $_POST['keterangan'];
$rincian =  $_POST['rincian'];
$item = $_POST['item'];
$total = $_POST['total'];

$query = mysql_query("UPDATE tbl_pengeluaran SET tgl='$tgl', rek='$rek', rincian='$rincian', item='$item', total='$total' WHERE no_bktpengeluaran='$no_bp'")or die(mysql_error());
if ($query){
echo "<script>alert('Data Berhasil Diedit'); window.location = 'pengeluaran.php'</script>";	
} else {
	echo "<script>alert('Data Gagal Disimpan'); window.location = 'pengeluaran.php'</script>";
    }
}
?>
