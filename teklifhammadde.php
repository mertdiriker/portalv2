<?php
include "databasebaglanti.php";
$sayi=$_POST['i'];
$ham=$_POST['urunid'];


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM hammadd WHERE hammadde_Ad = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $ham);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();


?><form action="form-group" id="receteolcut<?php echo $sayi;?>">
<input style="display:none;" type="text" onchange="post(<?php echo $sayi;?>)" name="i" value="<?php echo $sayi;?>">
<label for="">Hammadde En:</label><input type="text" onchange="post(<?php echo $sayi;?>)" name="en<?php echo $sayi?>" value="<?php echo $cikti['hammadde_En'];?>">
<br>
<label for="">Hammadde Boy:</label><input type="text" onchange="post(<?php echo $sayi;?>)" name="boy<?php echo $sayi?>" value="<?php echo $cikti['hammadde_Boy'];?>">
<br>
<label for="">Urun En:</label><input type="text" onchange="post(<?php echo $sayi;?>)" name="sen<?php echo $sayi?>" value="1">
<br>
<label for="">Urun Boy:</label><input type="text" onchange="post(<?php echo $sayi;?>)" name="sboy<?php echo $sayi?>" value="1">
<br>
<label for="">Fire: %</label><input type="text" onchange="post(<?php echo $sayi;?>)" name="fire<?php echo $sayi?>" value="10">
<br>
<label for="">MOQ: </label><input type="text" onchange="post(<?php echo $sayi;?>)" name="moq<?php echo $sayi?>" value="1">
<br>
</form>

<div id="sonuc<?php echo $sayi;?>">

</div>