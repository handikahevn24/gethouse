<?php

if (isset($_POST['simpan'])) {

	include("koneksi.php");

//$no_induk = $_POST['level'].$_POST['no_induk'];
$nama_siswa = $_POST['nama'];
$jk =  $_POST['jk'];
$level = $_POST['level'];
$sekolah_asal = $_POST['sekolah_asal'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telepon'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysql_query("SELECT * from tbl_siswa where level='$level' order by no_induk desc")or die(mysql_error());
$siswa = mysql_fetch_array($query);
$totalrowsiswa = mysql_num_rows($query);
if ($totalrowsiswa > 0) {
	$noterakhir = substr($siswa['no_induk'], -3);
	echo $noterakhir;
	$nurut = $noterakhir+1;
	$no_induk = $siswa['level']."000".$nurut;
}elseif ($totalrowsiswa == 0) {
	$nurut = 1;
	$no_induk = $level."000".$nurut;
}



$q = mysql_query("INSERT INTO tbl_siswa (no_induk, nama_siswa, jk, level, sekolah_asal, tempat_lahir, tgl_lahir, alamat, no_telp, username, password) VALUES (
	'$no_induk', '$nama_siswa', '$jk', '$level', '$sekolah_asal', '$tempat_lahir','$tanggal_lahir','$alamat', '$no_telp', '$username', '$password')")or die(mysql_error());

if ($q){
	echo "<script>alert('Data Berhasil Dimasukan'); window.location = 'login.php'</script>";
} else {
	echo "<script>alert('Data Gagal Disimpan');// window.location = 'login.php'</script>";
}
	# code...
}

?>
