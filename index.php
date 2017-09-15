<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:profil.php');    
} else {

include ("koneksi.php");
include 'header.php';
}
?>
<body class="fade-out">

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="data-master.php"><img src="gambar/data master.png" class="img-responsive center-block image" alt="Menu Pertama" width="75%" height="100%">
                    <div class="middle">
                        <div class="text">Data Master</div>
                    </div></a>
            </div>
            <div class="col-md-4">
                <a href="data-transaksi.php"><img src="gambar/transaksi.png" class="img-responsive center-block image" alt="Menu Pertama" width="75%" height="100%">
                    <div class="middle">
                        <div class="text">Transaksi</div>
                    </div></a>
            </div>
            <div class="col-md-4">
                <a href="laporan.php"><img src="gambar/laporan.png" class="img-responsive center-block image" alt="Menu Pertama" width="75%" height="100%">
                    <div class="middle">
                        <div class="text">Laporan</div>
                   </div></a>
            </div>
            <!-- <a href="data-siswa.php"><div class="col-md-4"><img src="gambar/default.jpg" class="img-responsive center-block image" alt="Menu Kedua" width="75%" height="75%"></div></a>
            <a href="data-bayaran.php"><div class="col-md-4"><img src="gambar/default.jpg" class="img-responsive center-block image" alt="Menu Kedua" width="75%" height="75%"></div></a>
            -->
        </div>
<!--
        <div class="row">
            <div class="col-md-4">
                <a href="pengeluaran.php"><img src="gambar/default.jpg" class="img-responsive center-block image" alt="Menu Pertama" width="75%" height="75%">
                    <div class="middle">
                        <div class="text">Pengeluaran</div>
                    </div></a>
            </div>
            <div class="col-md-4">
                <a href="data-bayaran.php"><img src="gambar/default.jpg" class="img-responsive center-block image" alt="Menu Pertama" width="75%" height="75%">
                    <div class="middle">
                        <div class="text">Data Bayaran</div>
                    </div></a>
            </div>
            <div class="col-md-4">
                <a href="laporan.php"><img src="gambar/default.jpg" class="img-responsive center-block image" alt="Menu Pertama" width="75%" height="75%">
                    <div class="middle">
                        <div class="text">Laporan</div>
                    </div></a>
            </div>
        </div>
-->
    </div>
</body>
</html>