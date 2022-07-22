<?php
include "databasebaglanti.php";
$ham=$_POST['kagit'];


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM hammadd WHERE hammadde_Ad = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $ham);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();


?><form action="form-group" id="kagitolcut">
<label for="">Birim başına m2 :</label><input type="text" onchange="postkagit()" name="kagitbirimm2" value="1">
<br>
<label for="">m2 fiyat:</label><input type="text" onchange="postkagit()" name="kagitfiyatm2" value="1">
<br>
<label for="">Fire:%</label><input type="text" onchange="postkagit()" name="kagitfire" value="5">
<br>
</form>

<div id="kagitsonuc">

</div>