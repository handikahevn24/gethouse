<?php
include 'koneksi.php';
$level = $_GET['level'];
$querylevel = mysql_query("SELECT * from tbl_paketlevel where level='$level'");
$rlevel = mysql_fetch_array($querylevel);
$data = array(
            'biaya'   =>  $rlevel['biaya'],);
 echo json_encode($data);

?>