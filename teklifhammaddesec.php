<br>
<?php
include "databasebaglanti.php";
$sayi=$_POST['urunid'];

for ($i = 1; $i <= $sayi; $i++) {
    ?>
  
  <div id="hammadde<?php echo $sayi;?>">

  <?php
    $stmt = $con->prepare('SELECT * FROM hammadd');
    // In this case we can use the account ID to get the account info.

    $stmt->execute();
    $sonuc = $stmt->get_result();

    $stmt->close();
    $cikti = $sonuc->fetch_array();
?>    

    <label for="urunad" style="background:rgb(57, 85, 136);
                    color:#fff;
                    padding-top:20px;
                    padding-bottom:20px;
                    padding-right:20px;
                    padding-left:20px;" >Hammadde <?php echo $i;?>:</label>
  &emsp;<select name="hammadde<?php echo $i;?>" id="urunler" onchange="HammaddeChange(this.value,<?php echo $i;?>)"  required>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["hammadde_Ad"];?>"><?php echo $cikti["hammadde_Ad"];?></option>
    <?php  }  ?>
  </select>


  </div>
  <div id="recete<?php echo $i;?>">

  </div>
  
  
  
  <?php
}

?>
 <?php
    $stmt = $con->prepare('SELECT * FROM hammadd');
    // In this case we can use the account ID to get the account info.

    $stmt->execute();
    $sonuc = $stmt->get_result();

    $stmt->close();
    $cikti = $sonuc->fetch_array();
?>    
<br>
    <label for="urunad" style="background:rgb(57, 85, 136);
                    color:#fff;
                    padding-top:20px;
                    padding-bottom:20px;
                    padding-right:20px;
                    padding-left:20px;" >Kağıt :</label>
  &emsp;<select name="hammadde<?php echo $i;?>" id="urunler" onchange="KagitChange(this.value)"  required>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["hammadde_Ad"];?>"><?php echo $cikti["hammadde_Ad"];?></option>
    <?php  }  ?>
  </select>
  <div id="kagit">

  </div>
  <br>
  <?php
    $stmt = $con->prepare('SELECT * FROM hammadd');
    // In this case we can use the account ID to get the account info.

    $stmt->execute();
    $sonuc = $stmt->get_result();

    $stmt->close();
    $cikti = $sonuc->fetch_array();
?>    

    <label for="urunad" style="background:rgb(57, 85, 136);
                    color:#fff;
                    padding-top:20px;
                    padding-bottom:20px;
                    padding-right:20px;
                    padding-left:20px;" >Ambalaj:</label>
  &emsp;<select name="hammadde<?php echo $i;?>" id="urunler" onchange="AmbalajChange(this.value,<?php echo $i;?>)"  required>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["hammadde_Ad"];?>"><?php echo $cikti["hammadde_Ad"];?></option>
    <?php  }  ?>
  </select>
  <div id="ambalaj">

  </div>
  <br>
  <?php
    $stmt = $con->prepare('SELECT * FROM hammadd');
    // In this case we can use the account ID to get the account info.

    $stmt->execute();
    $sonuc = $stmt->get_result();

    $stmt->close();
    $cikti = $sonuc->fetch_array();
?>    

    <label for="urunad" style="background:rgb(57, 85, 136);
                    color:#fff;
                    padding-top:20px;
                    padding-bottom:20px;
                    padding-right:20px;
                    padding-left:20px;" >Kalıp :</label>
  &emsp;<select name="hammadde<?php echo $i;?>" id="urunler" onchange="KalıpChange(this.value,<?php echo $i;?>)"  required>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["hammadde_Ad"];?>"><?php echo $cikti["hammadde_Ad"];?></option>
    <?php  }  ?>
  </select>
  <div id="kalip">

  </div>
  <br>
 
  <br>

    <label for="urunad" style="background:rgb(57, 85, 136);
                    color:#fff;
                    padding-top:20px;
                    padding-bottom:20px;
                    padding-right:20px;
                    padding-left:20px;" >Process Sayisi :</label>
  &emsp;<input type="text" placeholder = "Process Sayısı" name ="processsayi" id="processsayi" onchange="ProcessSayiChange(this.value)"  required>  
  <div id="process">

  </div>
  <br>
  <?php
    $stmt = $con->prepare('SELECT * FROM hammadd');
    // In this case we can use the account ID to get the account info.

    $stmt->execute();
    $sonuc = $stmt->get_result();

    $stmt->close();
    $cikti = $sonuc->fetch_array();
?>    

    <label for="urunad" style="background:rgb(57, 85, 136);
                    color:#fff;
                    padding-top:20px;
                    padding-bottom:20px;
                    padding-right:20px;
                    padding-left:20px;" >Diğer :</label>
  &emsp;<select name="hammadde<?php echo $i;?>" id="urunler" onchange="DigerChange(this.value,<?php echo $i;?>)"  required>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["hammadde_Ad"];?>"><?php echo $cikti["hammadde_Ad"];?></option>
    <?php  }  ?>
  </select>
  <div id="diger">

  </div>
    