<?php 
	// Koneksi ke database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek = mysqli_connect($servername, $username,$password,$database);
$sql_nilai = mysqli_query($konek, "SELECT * FROM status");

	// Baca data
$data_nilai = mysqli_fetch_array($sql_nilai);
$nilai = $data_nilai['Mode'];

if($nilai == 0){
	$nilai = "Manual";
}elseif($nilai == 1){
	$nilai = "Otomatis";
}
echo $nilai;
?>