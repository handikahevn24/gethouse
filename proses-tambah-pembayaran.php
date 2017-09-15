<?php
if (isset($_POST['simpan'])) {
	include("koneksi.php");

	if ($_POST['status_pembayaran']=="Lunas") {
		echo "<h1>TIDAK DAPAT DIPROSES KARENA SUDAH LUNAS</h1>";
		echo "<br>";
		?>
		<a href="javascript:history.back()"> Kembali </a>
		<?php exit;
		# code...
	}else if ($_POST['nominal'] > $_POST['sisa']) {
		echo "<h1>BAYARNYA KELEBIHAN Cek lagi</h1>";
		echo "<br>";
		?>
		<a href="javascript:history.back()"> Kembali </a>
		<?php exit;
	}else{





$tanggal = $_POST['tanggal'];
$nokwitansi = $_POST['nokwitansi'];
$no_induk =  $_POST['no_induk'];
$nama_siswa =  $_POST['nama_siswa'];
$level =  $_POST['level'];
//$total_tagihan = $_POST['total_tagihan'];
$status_pembayaran =  $_POST['status_pembayaran'];
$sisa = $_POST['sisa'];
$nominal =  $_POST['nominal'];

$q = mysql_query("INSERT INTO tbl_pembayaran (tgl_pembayaran, no_kwitansi, no_induk, nama_siswa, level, status_pembayaran, nominal ) VALUES (
	'$tanggal', '$nokwitansi', '$no_induk', '$nama_siswa', '$level', '$status_pembayaran', '$nominal')")or die(mysql_error());

if ($q){
	echo "<script>alert('Data Berhasil Dimasukan'); window.location = 'pembayaran.php'</script>";
} else {
	echo "<script>alert('Data Gagal Disimpan');// window.location = 'pembayaran.php'</script>";
}
	# code...
}
}
?>
