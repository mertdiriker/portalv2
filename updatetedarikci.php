<?php
// We need to use sessions, so you should always start sessions using the below code.
include 'databasebaglanti.php';
$tedarikciid=$_GET['id'];


$tedarikci=$_POST['tedarikci'];



// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('UPDATE tedarikci SET Tedarikci_Ad = ? WHERE Tedarikci_ID=?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('ss',$tedarikci,$tedarikciid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
header("location:satinalmaguncelle2.php");
?>