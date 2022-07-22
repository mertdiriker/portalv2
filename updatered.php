<?php

include 'databasebaglanti.php';
$talepid=$_GET['id'];

$adet=$_POST['adet'];
$birim=$_POST['birim'];
$firma1=$_POST['firma1'];
$firma2=$_POST['firma2'];
$firma3=$_POST['firma3'];
$fiyat1=$_POST['fiyat1'];
$fiyat2=$_POST['fiyat2'];
$fiyat3=$_POST['fiyat3'];
$fiyat3tur=$_POST['fiyattur3'];
$fiyat2tur=$_POST['fiyattur2'];
$fiyat1tur=$_POST['fiyattur1'];
$aciklama1=$_POST['aciklama1'];
$aciklama2=$_POST['aciklama2'];
$aciklama3=$_POST['aciklama3'];
$durum='Onay Bekleniyor';
$onay='Revize edildi';




$stmt = $con->prepare('UPDATE satinalma SET satinalma_Teklif1firma = ?,satinalma_Teklif2firma = ?,satinalma_Teklif3firma = ?,satinalma_Teklif1fiyat = ?,satinalma_Teklif2fiyat = ?,satinalma_Teklif3fiyat = ?,satinalma_Durum = ?,satinalma_Teklif1fiyattur = ?,satinalma_Teklif2fiyattur = ?,satinalma_Teklif3fiyattur = ?,satinalma_TeklifAciklama1 = ?,satinalma_TeklifAciklama2 = ?,satinalma_TeklifAciklama3 = ?,satinalma_Adet = ?,satinalma_Talepbirim = ?,satinalma_Onay = ? WHERE satinalma_ID=?');

$stmt->bind_param('sssssssssssssssss',$firma1,$firma2,$firma3,$fiyat1,$fiyat2,$fiyat3,$durum,$fiyat1tur,$fiyat2tur,$fiyat3tur,$aciklama1,$aciklama2,$aciklama3,$adet,$birim,$onay,$talepid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:satinalmatalepleronaybekle.php");
?>