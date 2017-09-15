<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:login.php');    
}
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];

include 'header.php';
include ("koneksi.php");
$query = mysql_query("SELECT *  FROM tbl_pembayaran where month(tgl_pembayaran)='$bulan' and year(tgl_pembayaran)='$tahun' ") or die(mysql_error());
?>
<body class="fade-out">
    <div class="container">
        <div class="jumbotron">
            <h1><center>Laporan Bulanan</center></h1>
        </div>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Kwitansi</th>
                    <th>Nama Siswa</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php
            if(mysql_num_rows($query) == 0){   
            echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
            
        }else{ 
            $no = 1;   
            $sum = 0;
            while($data = mysql_fetch_assoc($query)){  
                echo '<tr>';
                    echo '<td>'.$no.'</td>'; 
                    echo '<td>'.$data['no_kwitansi'].'</td>';
                    echo '<td>'.$data['nama_siswa'].'</td>';?>
                    <td>Rp. <?php echo number_format($data['nominal'],0);?></td>
                <?php
                    $sum += $data['nominal'];?>
                <?php
                echo '</tr>';
                
                $no++;                  
                }
            }
            ?>
            <tr>
                <th colspan="3">Total</th>
                    <td>Rp. <?php echo number_format($sum),0;?></td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>