<?php
include 'databasebaglanti.php';
$urunid=$_POST['urun'];
$tedarikciid=$_POST['tedarikci'];
$stmt = $con->prepare('SELECT * FROM urunler WHERE Urunler_ID = ?');

    $stmt->bind_param('s', $urunid);
    $stmt->execute();
    $sonuc = $stmt->get_result();
    $cikti = $sonuc->fetch_array();

    $stmt->close();
$urunad=$cikti['Urunler_Ad'];

$stmt = $con->prepare('SELECT * FROM tedarikci WHERE Tedarikci_ID = ?');

    $stmt->bind_param('s', $tedarikciid);
    $stmt->execute();
    $sonuc = $stmt->get_result();
    $cikti = $sonuc->fetch_array();

    $stmt->close();
$tedarikciad=$cikti['Tedarikci_Ad'];
?>
<form action="satinalmadirektalepgiris.php" method="POST" >
<div id="tedarikci">
    
       <label for="" style="background:black;color:white;"> Direk Sipariş</label> <br>
      <?php
    $stmt = $con->prepare('SELECT * FROM tedarikci');


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

    $stmt->bind_param('sss', $tedarikciid, $tedarikciid, $tedarikciid);
    $stmt->execute();
    $sonuc = $stmt->get_result();

    $stmt->close();


 ?>
 <label for="urunad"  >Urunleri:</label>
  &emsp;<select name="urun" id="urun" onchange="UrunChange(this.value,<?php echo $tedarikciid; ?>)"  required>
 
  <option value="<?php echo $urunid;?>"><?php echo $urunad;?></option>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["Urunler_ID"];?>"><?php echo $cikti["Urunler_Ad"];?></option>
    <?php  }  ?>
   
  </select>


      </div>
      <?php $stmt = $con->prepare('SELECT * FROM urunler WHERE Urunler_ID = ?');
    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('s', $urunid);
    $stmt->execute();
    $sonuc = $stmt->get_result();
    $cikti = $sonuc->fetch_array();

    $stmt->close();


 ?>
 <br>
	<?php if($tedarikciid==$cikti['Urunler_Tedarikci']){ ?>
 <label for=""  >Son Fiyat:</label>&emsp;<label for=""><?php echo $cikti['Urunler_Sonfiyat'].'-'.$cikti['Urunler_Sonfiyattur'];?>&emsp;</label> <?php } ?>
	
		<?php if($tedarikciid==$cikti['Urunler_Tedarikci2']){ ?>
 <label for=""  >Son Fiyat:</label>&emsp;<label for=""><?php echo $cikti['Urunler_Sonfiyat2'].'-'.$cikti['Urunler_Sonfiyattur2'];?>&emsp;</label> <?php } ?>
	
		<?php if($tedarikciid==$cikti['Urunler_Tedarikci3']){ ?>
 <label for=""  >Son Fiyat:</label>&emsp;<label for=""><?php echo $cikti['Urunler_Sonfiyat3'].'-'.$cikti['Urunler_Sonfiyattur3'];?>&emsp;</label> <?php } ?>
	
	<label for="">Yeni Fiyat:</label><input type="text" name="yenifiyat"><select name="fiyattur1" id="fiyattur1">
     <option value="TL">TL</option>
     <option value="Dolar">Dolar</option>
     <option value="Euro">Euro</option>
 </select>
 <label for="">Termin Süresi:</label><input type="text" name="termin1">
 <br>

  <br>
  <input placeholder="Adet" type="text" name="adet"><select name="birim" id="">
           <option value="m2">m2</option>
           <option value="metre">metre</option>
           <option value="adet">adet</option>
           <option value="paket">paket</option>
           <option value="koli">koli</option>
	<option value="kg">kg</option>
           <option value="diğer">diğer</option>
         </select>
         <select name="firma" id="">
           <option value="Burbant">Burbant</option>
           <option value="Miray">Miray</option>
			 <option value="Miray-Bakım">Miray-Bakım</option>
			 <option value="Burbant-Bakım">Burbant-Bakım</option>
           <option value="Diğer">Diğer</option>
         </select>
         <input placeholder="Aciklama" type="text" name="aciklama" required>

	  
		  <br>
         <br>
         <button class="btn btn-primary" name="submit">Direk Talep Oluştur</button>
         </form>