<?php
include 'databasebaglanti.php';
$tedarikciid=$_POST['tedarikci'];
$stmt = $con->prepare('SELECT * FROM tedarikci WHERE Tedarikci_ID = ?');
    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('s', $tedarikciid);
    $stmt->execute();
    $sonuc = $stmt->get_result();
    $cikti = $sonuc->fetch_array();

    $stmt->close();
$tedarikciad=$cikti['Tedarikci_Ad'];
?>
<div id="tedarikci">
       <label for="" style="background:black;color:white;"> Direk Sipariş</label> <br>
      <?php
    $stmt = $con->prepare('SELECT * FROM tedarikci');
    // In this case we can use the account ID to get the account info.

    $stmt->execute();
    $sonuc = $stmt->get_result();

    $stmt->close();
 
?>    

    <label for="urunad"  >Tedarikci:</label>
  &emsp;<select name="tedarikci" id="tedarikci" onchange="TedarikChange(this.value)"  required>
  <option value="<?php echo $tedarikciid;?>"><?php echo $tedarikciad;?></option>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["Tedarikci_ID"];?>"><?php echo $cikti["Tedarikci_Ad"];?></option>
    <?php  }  ?>
  </select>
  <?php $stmt = $con->prepare('SELECT * FROM urunler WHERE Urunler_Tedarikci = ? OR Urunler_Tedarikci2 = ? OR Urunler_Tedarikci3 = ?');
    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('sss', $tedarikciid, $tedarikciid, $tedarikciid);
    $stmt->execute();
    $sonuc = $stmt->get_result();

    $stmt->close();


 ?>
 <label for="urunad"  >Urunleri:</label>
  &emsp;<select name="tedarikci" id="tedarikci" onchange="UrunChange(this.value,'<?php echo $tedarikciid; ?>')"  required>
  <option value="">URUN SEC</option>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["Urunler_ID"];?>"><?php echo $cikti["Urunler_Ad"];?></option>
    <?php  }  ?>
  </select>


      </div>