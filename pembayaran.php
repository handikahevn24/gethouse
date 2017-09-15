<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:login.php');    
}
include 'header.php';
include ("koneksi.php");

$query = mysql_query("SELECT * FROM tbl_pembayaran ORDER BY no_kwitansi ASC") or die(mysql_error());
?>
<body class="fade-out">
    <div class="container">
        <div class="jumbotron">
            <h1><center>Pembayaran</center></h1>
        </div>
    <div class="row">
        <div class="col-md-12">
        <a href="tambah-pembayaran.php" class="btn btn-info noprint" role="button" style="margin-bottom: 5px;">Tambah Pembayaran</a>
        <table class="table table-striped table-bordered" id="t_pembayaran">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Kwitansi</th>
                    <th>No Induk</th>
                    <th>Nama Siswa</th>
                    <th>Level</th>
                    <th>Status Pembayaran</th>
                    <th>Nominal</th>
                    <th class="noprint">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
            if(mysql_num_rows($query) == 0){    //ini artinya jika data hasil query di atas kosong
            
            //jika data kosong, maka akan menampilkan row kosong
            echo '<tr><td colspan="7">Tidak ada data!</td></tr>';
            
        }else{  //else ini artinya jika data hasil query ada (data diu database tidak kosong)
            
            //jika data tidak kosong, maka akan melakukan perulangan while
            $no = 1;    //membuat variabel $no untuk membuat nomor urut
            while($data = mysql_fetch_assoc($query)){   //perulangan while dg membuat variabel $data yang akan mengambil data di database
                //tgl_pembayaran, no_kwitansi, no_induk, nama_siswa, level, status_pembayaran, nominal 
                //menampilkan row dengan data di database
                echo '<tr>';
                    echo '<td>'.$no.'</td>';    //menampilkan nomor urut
                    echo '<td>'.$data['tgl_pembayaran'].'</td>'; //menampilkan data nis dari database
                    echo '<td>'.$data['no_kwitansi'].'</td>';    //menampilkan data nama lengkap dari database
                    echo '<td>'.$data['no_induk'].'</td>';
                    echo '<td>'.$data['nama_siswa'].'</td>';
                    echo '<td>'.$data['level'].'</td>';
                    echo '<td>'.$data['status_pembayaran'].'</td>';
                    echo '<td>'.$data['nominal'].'</td>';
                    echo '<td class="noprint"><a href="hapus-pembayaran.php?no_kwitansi='.$data['no_kwitansi'].'" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash"></a> || <a href="print-kwitansi.php?no_kwitansi='.$data['no_kwitansi'].'&no_induk='.$data['no_induk'].'"><span class="glyphicon glyphicon-print"></a></td>'; //menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
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
    $('#t_pembayaran').DataTable();
} );
</script> 
</body>
</html>