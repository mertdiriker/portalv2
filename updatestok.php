<?php
// We need to use sessions, so you should always start sessions using the below code.
include 'databasebaglanti.php';
$stokid=$_GET['id'];
$stoktedarikci=$_POST['stoktedarikci'];
$stokurunid = $_POST['stokad'];
$stokkod = $_POST['stokkod'];
$stokmiktar = $_POST['stokmiktar'];
$stokfirma = $_POST['stokfirma'];
$stokirsno = $_POST['stokirsno'];
$stokirstarih = $_POST['stokirstarih'];
$stokurttarih = $_POST['stokurttarih'];
$stoklotn = $_POST['stoklot'];
$stoklokasyon= $_POST['stoklokasyon'];
$duzenleyen = $_SESSION['id'];
date_default_timezone_set('Europe/Istanbul');
$tarih = date('d-m-Y H:i:s',time());


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('UPDATE stok SET stok_urunid = ?,stok_miktar = ?,stok_firmaid = ?,stok_irsaliyeno = ?,stok_irsaliyetarihi = ?,stok_uretimtarihi = ?,stok_lotnumarasi = ?,stok_lokasyonid = ?,stok_duzenleyen = ?,stok_duzentarih = ?,stok_tedarikci = ?,stok_urunkod = ? WHERE stok_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('sssssssssss',$stokurunid,$stokmiktar,$stokfirma,$stokirsno,$stokirstarih,$stokurttarih,$stoklotn,$stoklokasyon,$duzenleyen,$tarih,$stokid,$stokkod);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:irsastok.php");
?>