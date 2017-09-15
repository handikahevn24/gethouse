<?php

if (isset($_POST['simpan'])) {

	include("koneksi.php");

$no_bp = $_POST['no_bp'];
$tgl = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];
$rincian =  $_POST['rincian'];
$item = $_POST['item'];
$total = $_POST['total'];

$q = mysql_query("INSERT INTO tbl_pengeluaran (no_bktpengeluaran, tgl, rek, rincian, item, total) VALUES (
	'$no_bp', '$tgl', '$keterangan', '$rincian', '$item','$total')");

if ($q){
		echo "<script>alert('Data Berhasil Dimasukan'); window.location = 'pengeluaran.php'</script>";
		} else {
			echo "<script>alert('Data Gagal Disimpan'); window.location = 'pengeluaran.php'</script>";
		}
	}
?>
