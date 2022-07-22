<?php

include 'databasebaglanti.php';
$talepid=$_GET['id'];

$sayi=$_POST['sayi'];


$stmt = $con->prepare('SELECT * FROM satinalma WHERE satinalma_ID = ?');
$stmt->bind_param('s', $talepid);
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();
$firma=$cikti['satinalma_Teklif'.$sayi.'firma'];


$not=$_POST['not'];
$onay="Onaylandı-".$firma."-".$not;
$durum="Siparis verilmesi bekleniyor";




$stmt = $con->prepare('UPDATE satinalma SET satinalma_Onay = ?,satinalma_Durum = ? WHERE satinalma_ID=?');

$stmt->bind_param('sss',$onay,$durum,$talepid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:satinalmatalepler.php");
?>