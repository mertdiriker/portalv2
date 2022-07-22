<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '1234';
$DATABASE_NAME = 'burbant_database';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stokid=$_GET['id'];
date_default_timezone_set('Europe/Istanbul');
$tarih = date('d-m-Y H:i:s',time());



$stmt = $con->prepare('UPDATE stok SET stok_silindi = TRUE, stok_silen = ? ,stok_siltarih = ? WHERE stok_id = ?');

$stmt->bind_param('sss',$_SESSION['id'],$tarih,$stokid);	
$stmt->execute();
$stmt->fetch();
$stmt->close();
header("location:irsastok.php");
?>