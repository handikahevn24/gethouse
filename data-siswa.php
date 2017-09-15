<?php 
include 'header.php';
include ("koneksi.php");

$query = mysql_query("SELECT * FROM tbl_siswa ORDER BY no_induk ASC") or die(mysql_error());
?>
<body class="fade-out">
    <div class="container">
        <div class="jumbotron">
            <h1><center>Data Siswa</center></h1>
        </div>
    <div class="row">
        <div class="col-md-12">
        <a href="tambah-siswa.php" class="btn btn-info noprint" role="button" style="margin-bottom: 5px;">Tambah Siswa</a>
        <table class="table table-striped table-bordered" id="t_siswa">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Induk</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Level</th>
                    <th>Sekolah Asal</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
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
                    echo '<td>'.$data['no_induk'].'</td>'; //menampilkan data nis dari database
                    echo '<td>'.$data['nama_siswa'].'</td>';    //menampilkan data nama lengkap dari database
                    echo '<td>'.$data['jk'].'</td>';
                    echo '<td>'.$data['level'].'</td>';
                    echo '<td>'.$data['sekolah_asal'].'</td>';
                    echo '<td>'.$data['tempat_lahir'].'</td>';
                    echo '<td>'.$data['tgl_lahir'].'</td>';
                    echo '<td>'.$data['alamat'].'</td>';
                    echo '<td>'.$data['no_telp'].'</td>';   //menampilkan data kelas dari database
                    echo '<td class="noprint"><a href="edit-siswa.php?no_induk='.$data['no_induk'].'"><span class="glyphicon glyphicon-edit"></a> / <a href="hapus-siswa.php?no_induk='.$data['no_induk'].'" onclick="return confirm(\'Yakin?\')"><span class="glyphicon glyphicon-trash"></a> / <a href="kartusiswa.php?no_induk='.$data['no_induk'].'"><span class="glyphicon glyphicon-print"></a> </td>'; //menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
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
    $('#t_siswa').DataTable();
} );
</script> 
</body>
</html>