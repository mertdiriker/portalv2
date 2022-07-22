<?php
$birimm2=$_POST['kagitbirimm2'];
$fiyatm2=$_POST['kagitfiyatm2'];
$kagitfire=$_POST['kagitfire'];
$kagitmaliyet=(($birimm2*$fiyatm2)*(100+$kagitfire)/100);
?>

<label for="">Kagit maliyet : </label><input type="text" name="kagitmaliyet" id="kagitmaliyet" value="<?php echo $kagitmaliyet;?>">


</div>
