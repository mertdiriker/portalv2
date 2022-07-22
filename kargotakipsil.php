<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'mert';
$DATABASE_PASS = 'huker6123';
$DATABASE_NAME = 'burbant_database';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$kargoid=$_GET['id'];
date_default_timezone_set('Europe/Istanbul');
$tarih = date('d-m-Y H:i:s',time());



$stmt = $con->prepare('UPDATE kargo SET kargo_Silindi = TRUE,kargo_Silen=?,kargo_Siltarih=? WHERE kargo_ID=?');

$stmt->bind_param('sss',$_SESSION['id'],$tarih,$kargoid);	
$stmt->execute();
$stmt->fetch();
$stmt->close();
header("location:kargotakip.php");
?>