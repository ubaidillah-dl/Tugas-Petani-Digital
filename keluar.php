<?php 
// Start sesi
session_start();

// Koneksi ke database
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "petanidigital";
$konek = mysqli_connect($servername, $username,$password,$database);

mysqli_query($konek,"UPDATE status SET Irigasi=0");
mysqli_query($konek,"UPDATE status SET Pompa=0");
mysqli_query($konek,"UPDATE status SET Mode=1");

// Hapus sesi
session_destroy();

//Pindah halaman masuk
header("location:masuk.php");
?>