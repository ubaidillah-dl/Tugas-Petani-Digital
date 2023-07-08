<?php
ini_set('date.timezone', 'Asia/Jakarta');
$now = new DateTime();
$tanggal = $now->format("d F Y H:i:s");

echo $tanggal;
?>