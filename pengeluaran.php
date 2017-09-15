<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:login.php');    
}
 include 'header.php';
include ("koneksi.php");
$query = mysql_query("SELECT pl.rek, keterangan, no_bktpengeluaran, tgl, rincian, item, total
FROM  tbl_rekpengeluaran pl
JOIN tbl_pengeluaran pn ON pl.rek = pn.rek") or die(mysql_error());
?>
<body class="fade-out">
    <div class="container">
        <div class="jumbotron">
            <h1><center>Pengeluaran</center></h1>
        </div>
    <div class="row">
        <div class="col-md-12">
        <a href="tambah-pengeluaran.php" class="btn btn-info noprint" role="button" style="margin-bottom: 5px;">Tambah Pengeluaran</a>                                                                                                                 
        <table class="table table-striped table-bordered" id="pengeluaran">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Bukti pengeluaran</th>
                    <th>Keterangan</th>
                    <th>Rincian</th>
                    <th>Item</th>
                    <th>Total</th>
                    <th class="noprint">Aksi</th>
                </tr>
            </thead>
            <tbody>
                 <?php
            if(mysql_num_rows($query) == 0){    //ini artinya jika data hasil query di atas kosong
            
            //jika data kosong, maka akan menampilkan row kosong
            echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
            
        }else{  //else ini artinya jika data hasil query ada (data diu database tidak kosong)
            
            //jika data tidak kosong, maka akan melakukan perulangan while
            $no = 1;    //membuat variabel $no untuk membuat nomor urut
            while($data = mysql_fetch_assoc($query)){   //perulangan while dg membuat variabel $data yang akan mengambil data di database
                
                //menampilkan row dengan data di database
                echo '<tr>';
                    echo '<td>'.$no.'</td>';    //menampilkan nomor urut
                    echo '<td>'.$data['tgl'].'</td>'; //menampilkan data nis dari database
                    echo '<td>'.$data['no_bktpengeluaran'].'</td>';    //menampilkan data nama lengkap dari database
                    echo '<td>'.$data['keterangan'].'</td>';
                    echo '<td>'.$data['rincian'].'</td>';
                    echo '<td>'.$data['item'].'</td>';
                    echo '<td>'.$data['total'].'</td>';
                    echo '<td class="noprint"><a href="edit-pengeluaran.php?no_bktpengeluaran='.$data['no_bktpengeluaran'].'"><span class="glyphicon glyphicon-edit"></span></a> || <a href="hapus-pengeluaran.php?no_bktpengeluaran='.$data['no_bktpengeluaran'].'" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash"></a> || <a href="kwitansi-pengeluaran.php?no_bktpengeluaran='.$data['no_bktpengeluaran'].'"><span class="glyphicon glyphicon-print"></a></td>'; //menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
                echo '</tr>';
                
                $no++;  //menambah jumlah nomor urut setiap row
                
                }
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function() {
    $('#pengeluaran').DataTable();
} );
</script>    
</body>
</html>