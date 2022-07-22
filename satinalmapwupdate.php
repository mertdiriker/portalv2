<?php
// We need to use sessions, so you should always start sessions using the below code.
include 'databasebaglanti.php';
$id=$_POST['personelid'];


$pw=$_POST['newpw'];



// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('UPDATE personel SET Personel_Sifre = ? WHERE Personel_ID=?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('ss',$pw,$id);	
$stmt->execute();


$stmt->fetch();
$stmt->close();
?>
<br>
<br>
<br>
<h2> Sifre Basariyla Degistirildi.<br>5 saniye icinde profilinize yonlendirileceksiniz. </h2>
<br>
<br>
<br>
<?php
header("Refresh: 3; url=satinalmaprofil.php")
?>