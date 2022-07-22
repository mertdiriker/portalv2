<br>
<br>
<?php
include 'databasebaglanti.php';
?><?php
    $stmt = $con->prepare('SELECT * FROM urunler');
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
                    padding-left:20px;" >Urun Seç:</label>
  &emsp;<select name="anaurun" id="urunler" onchange="UrunChange(this.value)"  required>
  <?php while ($cikti = $sonuc->fetch_array())
					{if ($cikti["Urunler_Silindi"]==FALSE){?>
    <option value="<?php echo $cikti["Urunler_Ad"];?>"><?php echo $cikti["Urunler_Ad"];?></option>
    <?php  } } ?>
  </select>