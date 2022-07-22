<?php
include "databasebaglanti.php";
$ham=$_POST['kalip'];



// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM hammadd WHERE hammadde_Ad = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $ham);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();


?><form action="form-group" id="kalipolcut">
<label for="">Kalıp Maliyeti :</label><input type="text" onchange="postkalip()" name="kalipmaliyet" value="1">
<br>
<label for="">Yıllık Kullanım :</label><input type="text" onchange="postkalip()" name="yillik" value="1">
<br>
<label for="">Fire:%</label><input type="text" onchange="postkalip()" name="kalipfire" value="5">
<br>
</form>

<div id="kalipsonuc">

</div>