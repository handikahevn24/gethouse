<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "db_get";
 
$link = mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db($name, $link) or die("Tidak ada database yang dipilih!");
?>