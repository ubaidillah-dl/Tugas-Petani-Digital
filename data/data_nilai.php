<?php 
	// Koneksi ke database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek = mysqli_connect($servername, $username,$password,$database);
$sql_nilai = mysqli_query($konek, "SELECT * FROM data ORDER BY Id DESC LIMIT 1");

	// Baca data
$data_nilai = mysqli_fetch_array($sql_nilai);
$nilai = $data_nilai['Ketinggian_Air'];

echo $nilai." cm";
?>
