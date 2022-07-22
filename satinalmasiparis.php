<?php

include 'databasebaglanti.php';
$talepid=$_GET['id'];



date_default_timezone_set('Europe/Istanbul');
$tarih = date('d-m-Y H:i:s',time());
$durum="Siparis verildi";



$stmt = $con->prepare('UPDATE satinalma SET satinalma_Durum = ?,satinalma_Siparistarih = ? WHERE satinalma_ID=?');

$stmt->bind_param('sss',$durum,$tarih,$talepid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:satinalmatalepler.php");
?>