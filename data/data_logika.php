<?php 
// Koneksi ke database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek = mysqli_connect($servername, $username,$password,$database);
$sql_usia = mysqli_query($konek, "SELECT * FROM usia");
$sql_mode = mysqli_query($konek, "SELECT * FROM status");
$sql_ketinggian = mysqli_query($konek, "SELECT * FROM data ORDER BY Id DESC LIMIT 1");

////////////////////////////////////////////////////////////////////////////// ambil data usia

// Set waktu
ini_set('date.timezone', 'Asia/Jakarta');
$now = new DateTime();
$datenow = $now->format("Y-m-d");

// Baca data
$data_usia = mysqli_fetch_array($sql_usia);
$usia = $data_usia['Usia'];

$tgl1 = strtotime($usia);
$tgl2 = strtotime($datenow);

$selisih = $tgl2 - $tgl1;
$usia = $selisih / 60 / 60 / 24;

////////////////////////////////////////////////////////////////////////////// ambil data ketinggian

$data_ketinggian = mysqli_fetch_array($sql_ketinggian);
$ketinggian = $data_ketinggian['Ketinggian_Air'];

////////////////////////////////////////////////////////////////////////////// ambil data mode

$data_mode = mysqli_fetch_array($sql_mode);
$mode = $data_mode['Mode'];

if($mode==1){
	if ($usia == 1) {
		if ($ketinggian < 1) {
			mysqli_query($konek,"UPDATE status SET Pompa=1");
			mysqli_query($konek,"UPDATE status SET Irigasi=0");
			echo "Pompa hidup";
		}else if($ketinggian > 1){
			mysqli_query($konek,"UPDATE status SET Irigasi=1");
			mysqli_query($konek,"UPDATE status SET Pompa=0");
			echo "Irigasi dibuka";
		}else if($ketinggian = 1){
			mysqli_query($konek,"UPDATE status SET Irigasi=0");
			mysqli_query($konek,"UPDATE status SET Pompa=0");
			echo "Pompa dan irigasi mati";
		}
	}else if($usia == 2){
		if ($ketinggian < 2) {
			mysqli_query($konek,"UPDATE status SET Pompa=1");
			mysqli_query($konek,"UPDATE status SET Irigasi=0");
			echo "Pompa hidup";
		}else if($ketinggian > 2){
			mysqli_query($konek,"UPDATE status SET Irigasi=1");
			mysqli_query($konek,"UPDATE status SET Pompa=0");
			echo "Irigasi dibuka";
		}else if($ketinggian = 2){
			mysqli_query($konek,"UPDATE status SET Irigasi=0");
			mysqli_query($konek,"UPDATE status SET Pompa=0");
			echo "Pompa dan irigasi mati";
		}
	}else if($usia == 3){
		if ($ketinggian > 0) {
			mysqli_query($konek,"UPDATE status SET Irigasi=1");
			mysqli_query($konek,"UPDATE status SET Pompa=0");
			echo "Irigasi dibuka";
		}else if ($ketinggian < 0) {
			mysqli_query($konek,"UPDATE status SET Irigasi=0");
			mysqli_query($konek,"UPDATE status SET Pompa=1");
			echo "Pompa dan irigasi mati";
		}else if ($ketinggian == 0) {
			mysqli_query($konek,"UPDATE status SET Irigasi=0");
			mysqli_query($konek,"UPDATE status SET Pompa=0");
			echo "Pompa dan irigasi mati";
		}
	}
}else if($mode==0){	
	
}
?>