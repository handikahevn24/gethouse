<?php 
include 'header.php';
include ("koneksi.php");

$query = mysql_query("SELECT * FROM tbl_paketlevel ORDER BY level ASC") or die(mysql_error());
?>

<body class="fade-out">
    <div class="container">
        <div class="jumbotron">
            <h1><center>Data Paket</center></h1>
        </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <a href="tambah-paket.php" class="btn btn-info" role="button" style="margin-bottom: 5px;">Tambah Paket</a>
        <table class="table table-striped table-bordered" id="t_paket">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Level</th>
                    <th>Nama Level</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
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
                    echo '<td>'.$data['level'].'</td>'; //menampilkan data nis dari database
                    echo '<td>'.$data['nama_level'].'</td>';    //menampilkan data nama lengkap dari database
                    echo '<td>'.$data['biaya'].'</td>';   //menampilkan data kelas dari database
                    echo '<td><a href="edit-paket.php?level='.$data['level'].'">Edit</a> / <a href="hapus-paket.php?level='.$data['level'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>'; //menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
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
    $('#t_paket').DataTable();
} );
</script> 
</body>
</html>