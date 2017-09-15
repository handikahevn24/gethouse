<?php
include("koneksi.php");

$no_induk = $_POST['no_induk'];
$nama_siswa = $_POST['nama'];
$jk =  $_POST['jk'];
$level = $_POST['level'];
$sekolah_asal = $_POST['sekolah_asal'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telepon'];


$query = mysql_query("UPDATE tbl_siswa SET nama_siswa='$nama_siswa', jk='$jk', level='$level', sekolah_asal='$sekolah_asal', tempat_lahir='$tempat_lahir', alamat='$alamat', no_telp='$no_telp' WHERE no_induk='$no_induk'")or die(mysql_error());
if ($query){
echo "<script>alert('Data Berhasil Diedit'); window.location = 'data-siswa.php'</script>";	
} else {
	echo "<script>alert('Data Gagal Disimpan'); window.location = 'data-siswa.php'</script>";
    }
?>