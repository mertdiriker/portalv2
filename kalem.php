<?php
$miktar=$_POST['kalem'];
?>
<br>
<?php for ($i = 1; $i <= $miktar; $i++) {
    ?>


<div id="kalem<?php echo $i;?>">
<label style="background:rgb(57, 85, 136);
          color:#fff;
          padding-left:20px;
          padding-top:20px;
          padding-right:20px;
          padding-bottom:20px;">Urun Kod :</label> &emsp;&emsp;  <input type="text"  placeholder=" UrunKod " name="urunkod<?php echo $i;?>" value= "" onchange="DivChange2(this.value,<?php echo $i;?>)"> 
 
  <br>
  <br>
     

  <div name="urun<?php echo $i;?>" id="urun<?php echo $i;?>">

</div>
<div name="lot<?php echo $i;?>" id="lot<?php echo $i;?>">

</div>
<br>
  </div>
  <?php } ?>