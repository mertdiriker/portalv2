<?php
$i=$_POST['i'];
$en = $_POST['en'.$i];
$boy = $_POST['boy'.$i];
$sen = $_POST['sen'.$i];
$sboy = $_POST['sboy'.$i];
$fire = $_POST['fire'.$i];
$moq = $_POST['moq'.$i];
$adet= ($en*$boy)/($sen*$sboy)*(100-$fire)/100;
$saf= ($en*$boy)/($sen*$sboy);
?>

<label for="">Teorik Çıkan Adet : </label><input type="text" name="teorik<?php echo $i;?>" id="teorik<?php echo $i;?>" value="<?php echo $adet;?>">
<input type="text" style="display:none;" name="en<?php echo $i;?>" value="<?php echo $en?>">
<input type="text" style="display:none;" name="boy<?php echo $i;?>" value="<?php echo $boy?>">
<input type="text" style="display:none;" name="sen<?php echo $i;?>" value="<?php echo $sen?>">
<input type="text" style="display:none;" name="sboy<?php echo $i;?>" value="<?php echo $sboy?>">
<input type="text" style="display:none;" name="fire<?php echo $i;?>" value="<?php echo $fire?>">
<input type="text" style="display:none;" name="moq<?php echo $i;?>" value="<?php echo $moq?>">

<label for="">Fiili Çıkan Adet : </label><input type="text" name="fiili<?php echo $i;?>" id="fiili<?php echo $i;?>" value="" onchange="FiiliChange(this.value,<?php echo $i;?>,<?php echo $moq;?>,<?php echo $saf;?>)">
<div name="hata<?php echo $i;?>" id="hata<?php echo $i;?>">

</div>



