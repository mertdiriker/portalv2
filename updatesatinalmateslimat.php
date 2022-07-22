<?php

include 'databasebaglanti.php';
$talepid=$_GET['id'];


$irsa1=$_POST['irsaliyeno1'];
$irsa2=$_POST['irsaliyeno2'];
$irsa3=$_POST['irsaliyeno3'];
$irsa4=$_POST['irsaliyeno4'];
$irsa5=$_POST['irsaliyeno5'];
$irsa6=$_POST['irsaliyeno6'];
$irsa7=$_POST['irsaliyeno7'];
$irsa8=$_POST['irsaliyeno8'];
$irsa9=$_POST['irsaliyeno9'];
$irsa10=$_POST['irsaliyeno10'];
$tarih1=$_POST['teslimtarih1'];
$tarih2=$_POST['teslimtarih2'];
$tarih3=$_POST['teslimtarih3'];
$tarih4=$_POST['teslimtarih4'];
$tarih5=$_POST['teslimtarih5'];
$tarih6=$_POST['teslimtarih6'];
$tarih7=$_POST['teslimtarih7'];
$tarih8=$_POST['teslimtarih8'];
$tarih9=$_POST['teslimtarih9'];
$tarih10=$_POST['teslimtarih10'];
$adet1=$_POST['adet1'];
$adet2=$_POST['adet2'];
$adet3=$_POST['adet3'];
$adet4=$_POST['adet4'];
$adet5=$_POST['adet5'];
$adet6=$_POST['adet6'];
$adet7=$_POST['adet7'];
$adet8=$_POST['adet8'];
$adet9=$_POST['adet9'];
$adet10=$_POST['adet10'];






$stmt = $con->prepare('UPDATE satinalma SET satinalma_teslimat1irsa = ?,satinalma_teslimat2irsa = ?,satinalma_teslimat3irsa = ?,satinalma_teslimat4irsa = ?,satinalma_teslimat5irsa = ?,satinalma_teslimat6irsa = ?,satinalma_teslimat7irsa = ?,satinalma_teslimat8irsa = ?,satinalma_teslimat9irsa = ?,satinalma_teslimat10irsa = ?,satinalma_teslimat1tarih = ?,satinalma_teslimat2tarih = ?,satinalma_teslimat3tarih = ?,satinalma_teslimat4tarih = ?,satinalma_teslimat5tarih = ?,satinalma_teslimat6tarih = ?,satinalma_teslimat7tarih = ?,satinalma_teslimat8tarih = ?,satinalma_teslimat9tarih = ?,satinalma_teslimat10tarih = ?,satinalma_teslimat1adet = ?,satinalma_teslimat2adet = ?,satinalma_teslimat3adet = ?,satinalma_teslimat4adet = ?,satinalma_teslimat5adet = ?,satinalma_teslimat6adet = ?,satinalma_teslimat7adet = ?,satinalma_teslimat8adet = ?,satinalma_teslimat9adet = ?,satinalma_teslimat10adet = ? WHERE satinalma_ID=?');

$stmt->bind_param('sssssssssssssssssssssssssssssss',$irsa1,$irsa2,$irsa3,$irsa4,$irsa5,$irsa6,$irsa7,$irsa8,$irsa9,$irsa10,$tarih1,$tarih2,$tarih3,$tarih4,$tarih5,$tarih6,$tarih7,$tarih8,$tarih9,$tarih10,$adet1,$adet2,$adet3,$adet4,$adet5,$adet6,$adet7,$adet8,$adet9,$adet10,$talepid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:satinalmatalepler.php");
?>