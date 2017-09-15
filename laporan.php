<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:login.php');    
}
 include 'header.php';?>
<body class="fade-out">

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="text-center">Laporan Pembayaran</h1>
                <a href="laporan-bulanan.php"><img src="gambar/report2.png" class="img-responsive center-block image" alt="Menu Pertama" 
                width="60%" height="100%">
                    <div class="middle">
                        <div class="text">Laporan Bulanan</div>
                    </div></a>
            </div>
            <div class="col-md-4">
                <h2 class="text-center">Laporan Data Bayaran</h2>
                <a href="data-bayaran.php"><img src="gambar/report1.png" class="img-responsive center-block image" alt="Menu Pertama" width=60%" height="100%">
                    <div class="middle">
                        <div class="text">Laporan Data Bayaran</div>
                    </div></a>
            </div>
            <div class="col-md-4">
                <h1 class="text-center">Laporan Pengeluaran</h1>
                <a href="laporan-pengeluaran.php"><img src="gambar/report3.png" class="img-responsive center-block image" alt="Menu Pertama" width=60%" height="100%">
                    <div class="middle">
                        <div class="text">Laporan Pengeluaran</div>
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