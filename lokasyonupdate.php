<?php
// We need to use sessions, so you should always start sessions using the below code.
include 'databasebaglanti.php';
$lokasyonid=$_GET['id'];

$lokasyonaciklama=$_POST['lokasyonaciklama'];
$lokasyonkod=$_POST['lokasyonkod'];
$lokasyonkapasite=$_POST['lokasyonkapasite'];
date_default_timezone_set('Europe/Istanbul');
$tarih = date('d-m-Y H:i:s',time());
$duzenleyen = $_SESSION['id'];



// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('UPDATE lokasyon SET lokasyon_aciklama = ?,lokasyon_kodu = ?,lokasyon_kapasite = ?,lokasyon_duzentarih = ?,lokasyon_duzenleyen = ? WHERE lokasyon_id=?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('ssssss',$lokasyonaciklama,$lokasyonkod,$lokasyonkapasite,$tarih,$duzenleyen,$lokasyonid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:lokasyon.php");
?>