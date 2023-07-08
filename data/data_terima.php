<?php
	// Koneksi ke database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek = mysqli_connect($servername, $username,$password,$database);

	// Set waktu
ini_set('date.timezone', 'Asia/Jakarta');
$now = new DateTime();
$datenow = $now->format("Y-m-d H:i:s");

	// Baca data yang dikirim Esp8266
$nilai = $_POST["Ketinggian_Air"];

	// Update data tabel
mysqli_query($konek, "INSERT INTO data VALUES ('','$nilai','$datenow')");
?>