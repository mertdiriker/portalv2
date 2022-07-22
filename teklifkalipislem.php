<?php
$kalipmaliyet=$_POST['kalipmaliyet'];
$yillik=$_POST['yillik'];
$kalipfire=$_POST['kalipfire'];
$kalipurunmaliyet=(($kalipmaliyet*$yillik)*(100+$kalipfire)/100);
?>

<label for="">Kalip Urun Başına Maliyet : </label><input type="text" name="kagitmaliyet" id="kagitmaliyet" value="<?php echo $kalipurunmaliyet;?>">


</div>
