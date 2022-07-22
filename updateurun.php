<?php
// We need to use sessions, so you should always start sessions using the below code.
include 'databasebaglanti.php';
$urunid=$_GET['id'];

$urunkod=$_POST['urunkod'];
$urunad=$_POST['urunad'];
$urunolcut=$_POST['urunolcut'];
$sonfiyat=$_POST['sonfiyat'];
$sonfiyat2=$_POST['sonfiyat2'];
$sonfiyat3=$_POST['sonfiyat3'];
$tedarikci=$_POST['tedarikci'];
$tedarikci2=$_POST['tedarikci2'];
$tedarikci3=$_POST['tedarikci3'];
$sonfiyattur=$_POST['sonfiyattur'];
$sonfiyattur2=$_POST['sonfiyattur2'];
$sonfiyattur3=$_POST['sonfiyattur3'];



// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('UPDATE urunler SET Urunler_Ad = ?,Urunler_Kod = ?,Urunler_Olcut = ?,Urunler_Sonfiyat = ?,Urunler_Sonfiyat2 = ?,Urunler_Sonfiyat3 = ?,Urunler_Tedarikci = ?,Urunler_Tedarikci2 = ?,Urunler_Tedarikci3 = ?,Urunler_Sonfiyattur = ?,Urunler_Sonfiyattur2 = ?,Urunler_Sonfiyattur3 = ? WHERE Urunler_ID=?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('sssssssssssss',$urunad,$urunkod,$urunolcut,$sonfiyat,$sonfiyat2,$sonfiyat3,$tedarikci,$tedarikci2,$tedarikci3,$sonfiyattur,$sonfiyattur2,$sonfiyattur3,$urunid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:satinalmaguncelle.php");
?>