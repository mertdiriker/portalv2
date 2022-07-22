<?php
$i=$_POST['i'];
$fiili=$_POST['fiili'];
$moq=$_POST['moq'];
$saf=$_POST['saf'];

if(($saf-$fiili)>($saf/10)){
    echo 'HATA : FİRE ½10 DEN FAZLA';
}
echo '<br>';
if(!($fiili%$moq==0)){
    echo 'HATA : MOQ KATI DEĞİL';
}
?>