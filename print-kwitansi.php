<?php
include "koneksi.php";
$no_kwitansi = $_GET['no_kwitansi'];
$no_induk = $_GET['no_induk'];


$query = mysql_query("SELECT * FROM tbl_pembayaran,tbl_paketlevel WHERE no_kwitansi='$no_kwitansi' and tbl_paketlevel.level = tbl_pembayaran.level order by no_kwitansi desc");
$data = mysql_fetch_array($query);
$sisapembayaran = mysql_query("SELECT *, SUM(tbl_pembayaran.nominal) as total FROM tbl_pembayaran, tbl_paketlevel where no_induk='$no_induk' and tbl_paketlevel.level = tbl_pembayaran.level");
$caritotal = mysql_fetch_array($sisapembayaran);
$sisa = $caritotal['biaya'] - $caritotal['total'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Kwitansi GET Karangampel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="/ririn/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.15/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
<style type="text/css">
  @media print {
      .noprint{
        display: none;
      }
  }
</style>
</head>
<body style="margin-top: 4%;">
<div class="container">

<table width="800" border="1" align="left" cellpadding="6" cellspacing="0" bordercolor="#0099FF">
  <tr>
    <td align="left" valign="top"><table width="800" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td height="40" colspan="4"><strong>BUKTI PEMBAYARAN / KAS MASUK</strong></td>
        <td><img style="float:right; margin-top: 5px;" src="gambar/logo get.png" alt="Logo"></td>
        </tr>
      <tr>
        <td width="183">Tanggal</td>
        <td width="328">: <?php echo $data['tgl_pembayaran']; ?></td>
        <td width="70">&nbsp;</td>
        <td width="137">&nbsp;</td>
      </tr>
      <tr>
        <td>No. Kwitansi</td>
        <td colspan="3">: <?php echo $data['no_kwitansi']; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td>Telah diterima dari</td>
        <td colspan="3">: <?php echo $data['no_induk']; ?> - <?php echo $data['nama_siswa']; ?></td>
      </tr>
      <tr>
        <td>Untuk </td>
        <td colspan="3">: Pembayaran Kursus pada level : <?php echo $data['nama_level']; ?></td>
      </tr>
      <tr>
        <td>Keterangan </td>
        <td colspan="3">: <?php echo $data['status_pembayaran']; ?></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#0099FF"># Rp.<strong><?php echo number_format($data['nominal'],0); ?></strong>,- #</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="150" colspan="3" align="center" valign="top"><table width="500" border="0" cellspacing="0" cellpadding="4">
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">Karangampel, <?php echo $data['tgl_pembayaran']; ?></td>
            </tr>
          <tr>
            <td align="center"><p>&nbsp;</p>
            <td align="center">&nbsp;</td>
            <td align="center" valign="bottom"><br><br>Ririn Indraswari</strong></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="noprint" align="left" valign="top" bgcolor="#0099FF"><button class="btn btn-success" onclick="myFunction();"><span class="glyphicon glyphicon-print"></button></td>
  </tr>
</table>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>