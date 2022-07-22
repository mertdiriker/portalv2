<?php

include 'databasebaglanti.php';
$talepid=$_POST['idkapat'];

$durum="Siparis Kapatildi";




$stmt = $con->prepare('UPDATE satinalma SET satinalma_Durum = ? WHERE satinalma_ID=?');

$stmt->bind_param('ss',$durum,$talepid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:satinalmatalepler.php");
?>