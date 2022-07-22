<?php
include "databasebaglanti.php";
$ham=$_POST['ambalaj'];


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM hammadd WHERE hammadde_Ad = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $ham);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();


?><form action="form-group" id="ambalajolcut">
<label for="">Ambalaj sayısı :</label><input type="text" onchange="postambalaj()" name="ambalajsayi" value="1">
<br>
<label for="">Ambalaj cinsi fiyatı :</label><input type="text" onchange="postambalaj()" name="ambalajcinsfiyat" value="1">
<br>
<label for="">Fire:%</label><input type="text" onchange="postambalaj()" name="ambalajfire" value="5">
<br>
</form>

<div id="ambalajsonuc">

</div>