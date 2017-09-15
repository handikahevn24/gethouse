<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:login.php');    
}
include 'header.php';
include ("koneksi.php");

$query = mysql_query("SELECT DISTINCT *, sum(tbl_pembayaran.nominal) as total FROM tbl_pembayaran, tbl_paketlevel where tbl_paketlevel.level = tbl_pembayaran.level GROUP BY nama_siswa") or die(mysql_error());
?>
<body class="fade-out">
    <div class="container">
        <div class="jumbotron">
            <h1><center>Data Bayaran</center></h1>
        </div>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Induk</th>
                    <th>Nama Siswa</th>
                    <th>Level</th>
                    <th>Biaya Kursus</th>
                    <th>Angsuran 1</th>
                    <th>Angsuran 2</th>
                    <th>Angsuran 3</th>
                    <th>Keterangan</th>
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
                $ni = $data['no_induk'];
                echo '<tr>';
                    echo '<td>'.$no.'</td>';    //menampilkan nomor urut   //menampilkan data nama lengkap dari database
                    echo '<td>'.$data['no_induk'].'</td>';
                    echo '<td>'.$data['nama_siswa'].'</td>';
                    echo '<td>'.$data['level'].'</td>';
                    echo '<td>'.$data['biaya'].'</td>';
                    $query2 =mysql_query("SELECT * FROM tbl_pembayaran where no_induk = '$ni' and status_pembayaran = 'Angsuran 1' ");
                    $angsuran1 = mysql_fetch_array($query2);
                    if (empty($angsuran1['nominal'])) {
                        $a1 = '-';
                        echo '<td>'.$a1.'</td>';
                    }else {
                        echo '<td>'.$angsuran1['nominal'];
                    };
                    $query3 =mysql_query("SELECT * FROM tbl_pembayaran where no_induk = '$ni' and status_pembayaran = 'Angsuran 2' ");
                    $angsuran2 = mysql_fetch_array($query3);
                    if (empty($angsuran2['nominal'])) {
                        $a2 = '-';
                        echo '<td>'.$a2.'</td>';
                    }else {
                        echo '<td>'.$angsuran2['nominal'].'</td>';
                    };
                     $query4 =mysql_query("SELECT * FROM tbl_pembayaran where no_induk = '$ni' and status_pembayaran = 'Angsuran 3' ");
                    $angsuran3 = mysql_fetch_array($query4);
                    if (empty($angsuran3['nominal'])) {
                        $a3 = '-';
                        echo '<td>'.$a3.'</td>';
                    }else {
                        echo '<td>'.$angsuran3['nominal'].'</td>';
                    };
                    $totalbayar = $data['total'];
                    $biaya = $data['biaya'];
                    $keterangan = $totalbayar - $biaya;
                    if ($keterangan >= 0) {
                        echo '<td>'.'Lunas'.'</td>';
                    }else {
                        echo '<td>'.'Sisa Tagihan : Rp.'.number_format(abs($keterangan),0).'</td>';
                    };


               //     if ($data['total']-$data['biaya']==0) {
                //        echo '<td>'.'Lunas'.'</td>';
                  //  }else {
                    //    echo '<td>'.'Belum Lunas'.'</td>';
                    //};

                echo '</tr>';
                
                $no++;  //menambah jumlah nomor urut setiap row
                
                }
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>