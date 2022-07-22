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
$talepid=$_GET['id'];
date_default_timezone_set('Europe/Istanbul');
$tarih = date('d-m-Y H:i:s',time());



$stmt = $con->prepare('UPDATE satinalma SET satinalma_Silindi = TRUE,satinalma_Silen=?,satinalma_SilmeTarih=? WHERE satinalma_ID=?');

$stmt->bind_param('sss',$_SESSION['id'],$tarih,$talepid);	
$stmt->execute();
$stmt->fetch();
$stmt->close();
header("location:satinalmatalepler.php");
?>