<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:login.php');    
}


include 'header.php';
include ("koneksi.php");
$query = mysql_query("SELECT *  FROM tbl_pengeluaran") or die(mysql_error());
$rekening = mysql_fetch_array($query);
?>
<body class="fade-out">
    <div class="container">
        <div class="jumbotron">
            <h1><center>LAPORAN PENGELUARAN GLOBAL </center></h1>
        </div>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Bukti Pengeluaran</th>
                    <th>Tanggal</th>
                    <th>Rincian</th>
                    <th>Item</th>
                    <th>Total</th>
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
                    echo '<td>'.$data['no_bktpengeluaran'].'</td>';
                    echo '<td>'.$data['tgl'].'</td>';
                    echo '<td>'.$data['rincian'].'</td>';?>
                    <td><?php echo $data['item'];?></td>
                    <td>Rp. <?php echo number_format($data['total']);?></td>
                <?php
                    $sum += $data['total'];
                echo '</tr>';
                
                $no++;                  
                }
            }
            ?>
            <tr>
                <th colspan="5">Total</th>
                    <td><strong>Rp. <?php echo number_format($sum);?></strong></td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>