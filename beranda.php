<?php
session_start();
if (!isset($_SESSION['masuk'])) {
  header("location:masuk.php");
}
?>

<!doctype html>
<html lang="en">

<!-- head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petani Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="assets/farmer.png" rel="icon" type="image/png" />
    
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/grafik.js"></script>

    <!-- ambil data -->
    <script type="text/javascript">
        var refresh = setInterval(function() {
            $('#waktu').load('waktu.php');
            $('#data_grafik').load('data/data_grafik.php');
            $('#data_usia').load('data/data_usia.php');
            $('#data_nilai').load('data/data_nilai.php');
            $('#status_pompa').load('data/data_pompa.php');
            $('#status_irigasi').load('data/data_irigasi.php');
            $('#status_mode').load('data/data_mode.php');
        },
        1000
        );
    </script>
    <!-- akhir ambil data -->

    <!-- kirim status pompa -->
    <script type="text/javascript">
      function status_pompa(val) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            val = xmlhttp.responseText;
        }    }
        xmlhttp.open("GET", "status/status_pompa.php?stat=" + val, true);
        xmlhttp.send();}
    </script>
    <!-- akhir kirim status pompa -->

    <!-- kirim status irigasi -->
    <script type="text/javascript">
      function status_irigasi(val) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            val = xmlhttp.responseText;
        }}
        xmlhttp.open("GET", "status/status_irigasi.php?stat=" + val, true);
        xmlhttp.send();}
    </script>
    <!-- akhir kirim status irigasi -->

    <!-- kirim status mode -->
    <script type="text/javascript">
        function status_mode(val) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                val = xmlhttp.responseText;
            }}
            xmlhttp.open("GET", "status/status_mode.php?stat=" + val, true);
            xmlhttp.send();
        }
    </script>
    <!-- akhiri status mode -->
</head>
<!-- akhir head -->


<!-- body -->
<body>
    <!-- container -->
    <div class="container">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light rounded my-2" style="background-color: rgba(76,132,222,0.1) ;">
            <div class="container">
                <a class="navbar-brand fs-3 fw-semibold" href="#">
                    <img src="assets/farmer.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-center"> Kontrol Ketinggian Air Sawah Berdasarkan Usia Tanaman Padi</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active fs-6" aria-current="page" href="#">Beranda</a>
                        <a class="nav-link active fs-6" aria-current="page" href="keluar.php">Keluar</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- akhir navbar -->

        <!-- waktu -->
        <div class="row">
            <div class="col-12">
                <div  class="rounded mb-2 d-flex justify-content-center align-items-center text-center fw-semibold text-white" id="waktu" style="height:30px; background-color: rgba(76,132,222,1);">
                    01 Januari 1970 00:00:00
                </div>
            </div>
        </div>
        <!-- akhir waktu -->

        <!-- grafik dan status-->
        <div class="row gx-2 gy-2">

            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="rounded d-flex justify-content-center align-items-center text-center p-2" id="data_grafik" style="height: 100%; border: solid 2px rgba(76,132,222,1);">Grafik</div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="rounded d-flex justify-content-center align-items-center text-center py-2" style="height: 100%; background-color: rgba(76,132,222,1);">

                    <div style="width:80%;">

                        <div class="row gy-2 py-2">
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="bg-white rounded d-flex justify-content-center align-items-center text-center fw-semibold" style="height: 30px; margin-bottom: 3%;">Usia Padi</div>
                            </div>
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="fw-semibold text-white" style="margin-bottom: 9%;" id="data_usia">0 hari</div>
                            </div>
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="bg-white rounded d-flex justify-content-center align-items-center text-center fw-semibold" style="height: 30px; margin-bottom: 3%;">Tinggi Air</div>
                            </div>
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="fw-semibold text-white" style="margin-bottom: 9%;" id="data_nilai">0 cm</div>
                            </div>
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="bg-white rounded d-flex justify-content-center align-items-center text-center fw-semibold" style="height: 30px; margin-bottom: 3%;">Pompa</div>
                            </div>
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="fw-semibold text-white" style="margin-bottom: 9%;" id="status_pompa">Mati</div>
                            </div>
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="bg-white rounded d-flex justify-content-center align-items-center text-center fw-semibold" style="height: 30px; margin-bottom: 3%;">Irigasi</div>
                            </div>
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="fw-semibold text-white" style="margin-bottom: 9%;" id="status_irigasi">Tertutup</div>
                            </div>
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="bg-white rounded d-flex justify-content-center align-items-center text-center fw-semibold" style="height: 30px; margin-bottom: 3%;">Mode</div>
                            </div>
                            <div class="col-3 col-sm-3 col-lg-12">
                                <div class="fw-semibold text-white" style="margin-bottom: 9%;" id="status_mode">Otomatis</div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!-- akhir grafik dan status -->

        <!-- kontrol -->
        <div class="row gx-2 gy-2 mt-1">

            <!-- atur -->
            <div class="col-sm-12 col-md-4 order-2 order-sm-2 order-md-1" >
                <div class="rounded d-flex justify-content-center align-items-center p-2" style="height:100%; background-color:rgba(76,132,222,1);">
                    <div>
                        <form class="d-flex justify-content-center align-items-center" action="" method="post">
                            <button type="submit" name="submit" class="submit rounded btn btn-sm fw-semibold text-black" style="background-color: white; height: 30px;">
                                Atur
                            </button>
                            <input style="border:solid 2px rgba(76,132,222,1); margin-left: 5px; height: 30px;" class="tanggal text-center rounded" type="date" name="tanggal" id="tanggal">
                        </form>
                    </div>
                </div>
            </div>
            <!-- akhir atur -->

            <!-- kontrol -->
            <div class="col-sm-12 col-md-8 order-1 order-sm-1 order-md-2">
                <div class="rounded p-3" style="height:100%; border: solid 2px rgba(76,132,222,1);">
                    <div class="row gx-2 align-items-center">

                        <!-- pompa -->
                        <div class="col-4 col-sm-4 order-sm-1 order-1 order-md-1 col-md-2">
                            <div class="rounded d-flex justify-content-center align-items-center fw-semibold text-white" style="height: 30px; background-color: rgba(76,132,222,1);">
                                <label class="form-check-label" for="pompa">Pompa</label>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 order-sm-4 order-4 order-md-2 col-md-2">
                            <div class="form-check form-switch d-flex align-items-center justify-content-center" style="height: 30px;">
                                <input class="form-check-input" type="checkbox" id="pompa" onchange="status_pompa(this.checked)">
                            </div>
                        </div>
                        <!-- akhir pompa -->

                        <!-- irigasi -->
                        <div class="col-4 col-sm-4 order-sm-2 order-2 order-md-3 col-md-2">
                            <div class="rounded d-flex justify-content-center align-items-center fw-semibold text-white" style="height: 30px; background-color: rgba(76,132,222,1);">
                                <label class="form-check-label" for="irigasi">Irigasi</label>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 order-sm-5 order-5 order-md-4 col-md-2">
                            <div class="form-check form-switch d-flex align-items-center justify-content-center" style="height: 30px;">
                                <input class="form-check-input" type="checkbox" id="irigasi" onchange="status_irigasi(this.checked)">
                            </div>
                        </div>
                        <!-- akhir irigasi -->

                        <!-- mode -->
                        <div class="col-4 col-sm-4 order-sm-3 order-3 order-md-5 col-md-2">
                            <div class="rounded d-flex justify-content-center align-items-center fw-semibold text-white" style="height: 30px; background-color: rgba(76,132,222,1);">
                                <label class="form-check-label" for="mode">Mode</label>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 order-sm-5 order-5 order-md-6 col-md-2">
                            <div class="form-check form-switch d-flex justify-content-center align-items-center" style="height: 30px;">
                                <input class="form-check-input" type="checkbox" id="mode" checked onchange="status_mode(this.checked)">
                            </div>
                        </div>
                        <!-- akhir mode -->
                    </div>
                </div>
            </div>
            <!-- akhir kontrol -->
        </div>
    </div>
</div>
<!-- akhir continer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
<!-- akhir body -->

</html>




<?php 
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek = mysqli_connect($servername, $username,$password,$database);

if (isset($_POST['submit'])) {
  mysqli_query($konek, "UPDATE usia SET Usia = '$_POST[tanggal]'");
}
?>