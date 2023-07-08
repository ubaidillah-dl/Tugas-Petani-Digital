<?php 
	// Koneksi ke database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek = mysqli_connect($servername, $username,$password,$database);

$stat = $_GET['stat'];

if ($stat=="true") {
	mysqli_query($konek,"UPDATE status SET Irigasi=1");
	echo"Terbuka";
}else{
	mysqli_query($konek,"UPDATE status SET Irigasi=0");
	echo"Tertutup";
}
?>