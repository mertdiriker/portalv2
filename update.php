<?php
// We need to use sessions, so you should always start sessions using the below code.
include 'databasebaglanti.php';
$urunid=$_GET['id'];

$urunkod=$_POST['urunkod'];
$urunad=$_POST['urunad'];
$urunolcut=$_POST['urunolcut'];


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('UPDATE urunler SET Urunler_Ad = ?,Urunler_Kod = ?,Urunler_Olcut = ? WHERE Urunler_ID=?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('ssss',$urunad,$urunkod,$urunolcut, $urunid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:test.php");
?>