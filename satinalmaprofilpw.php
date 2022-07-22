<?php
$id=$_POST['id'];

?>
<form action="satinalmapwupdate.php" method="POST">
<input style="display:none; " type="text" name="personelid" value="<?php echo $id;?>">
<label for="">Yeni Sifre:</label><input type="password" name="newpw" id="newpw" value="">
<button>Sifreyi Onayla</button>
</form>