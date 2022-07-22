<?php
// We need to use sessions, so you should always start sessions using the below code.
include 'databasebaglanti.php';
$firmaid=$_GET['id'];


$firmaad=$_POST['firmaad'];



// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('UPDATE firma SET Firma_Ad = ? WHERE Firma_ID=?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('ss',$firmaad,$firmaid);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
echo "Bitti";
?>