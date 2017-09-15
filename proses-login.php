<?php 


if (isset($_POST['kirim'])) {
include ("koneksi.php");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysql_query("SELECT * FROM tbl_siswa where username = '$username' AND password = '$password'") or die(mysql_error());
$row = mysql_fetch_array ($query);

if (mysql_num_rows($query) == 1) {
	$_SESSION['username'] = $username;
	$_SESSION['no_induk'] = $row['no_induk'];
	echo "<script>alert('Berhasil Login'); window.location = 'kartusiswa.php'</script>";
	
} else {
	echo "<script>alert('Gagal Login'); window.location = 'login.php'</script>";
}

}

?>