<?php
//defined('BASEPATH') or die("No access direct allowed");

$host = 'localhost';
$user = 'beab1437_kumhamjambi';
$pass = 'N0v3rm4n';
$db   = 'beab1437_ukpbj';

$con  = new mysqli($host, $user, $pass, $db) or die(mysqli_error());

if(!$con){
	echo "Koneksi Database Gagal...!!!";
}


?>
