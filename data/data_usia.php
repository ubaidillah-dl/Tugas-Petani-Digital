<?php 
// Koneksi ke database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek = mysqli_connect($servername, $username,$password,$database);
$sql_nilai = mysqli_query($konek, "SELECT * FROM usia");

// Set waktu
ini_set('date.timezone', 'Asia/Jakarta');
$now = new DateTime();
$datenow = $now->format("Y-m-d");

// Baca data
$data_usia = mysqli_fetch_array($sql_nilai);
$nilai = $data_usia['Usia'];

$tgl1 = strtotime($nilai);
$tgl2 = strtotime($datenow);

$selisih = $tgl2 - $tgl1;
$hari = $selisih / 60 / 60 / 24;

echo $hari ." hari";
?>