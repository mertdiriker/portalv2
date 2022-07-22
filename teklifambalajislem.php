<?php
$ambalajsayi=$_POST['ambalajsayi'];
$ambalajcinsfiyat=$_POST['ambalajcinsfiyat'];
$ambalajfire=$_POST['ambalajfire'];
$ambalajmaliyet=(($ambalajsayi*$ambalajcinsfiyat)*(100+$ambalajfire)/100);
?>

<label for="">Ambalaj maliyet : </label><input type="text" name="ambalajmaliyet" id="ambalajmaliyet" value="<?php echo $ambalajmaliyet;?>">


</div>
