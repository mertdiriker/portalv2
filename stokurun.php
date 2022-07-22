<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '1234';
    $DATABASE_NAME = 'burbant_database';
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
        if (mysqli_connect_errno()) {
            exit('Failed to connect to MySQL: ' . mysqli_connect_error());
        }

$i=$_POST['i'];
$info=$_POST['urunid'];
$stmt = $con->prepare('SELECT * FROM urunler WHERE Urunler_Kod = ? OR Urunler_Barkod= ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('ss',$info,$info);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->close();
?>




<?php while ($cikti = $sonuc->fetch_array())
					{if ($cikti["Urunler_Silindi"]==FALSE){?>

<label style="background:rgb(57, 85, 136);
          color:#fff;
          padding-left:10px;
          padding-top:10px;
          padding-right:10px;
          padding-bottom:10px;" >Stok Ad :</label>      <input type="text"  placeholder=" UrunKod " name="urunad<?php echo $i;?>" value= "<?php echo $cikti['Urunler_Ad']; ?>"> 
&emsp;&emsp; 
  <label style="background:rgb(57, 85, 136);
          color:#fff;
          padding-left:10px;
          padding-top:10px;
          padding-right:10px;
          padding-bottom:10px;" >Stok Olcut : </label>   <input type="text" style="width:50px;"  placeholder=" UrunOlcut " name="urunolcut<?php echo $i;?>"  value= "<?php echo $cikti['Urunler_Olcut']; ?>"> 
  <label><?php echo $cikti['Urunler_Olcutturu'];?></label>
  <input type="text" style="display:none;" name="urunolcuttur<?php echo $i;?>" id="urunolcuttur" value="<?php echo $cikti['Urunler_Olcutturu'];?>">
  &emsp;&emsp;

  <?php
$stokfirma=$cikti['Urunler_Firma'];
} } ?>
  <?php
  
 $query = "SELECT * FROM firma ORDER BY firma_ad";
 $result = $con->query($query);
  ?>
  <label for="email" style="background:rgb(57, 85, 136);
          color:#fff;
          padding-left:10px;
          padding-top:10px;
          padding-right:10px;
          padding-bottom:10px;">Stok Firma :</label><select name="firma<?php echo $i;?>" id="firma<?php echo $i;?>"  style="width:250px;" value="<?php echo $stokfirma; ?>">
            <option value="<?php echo $stokfirma; ?>">&emsp;<?php echo $stokfirma; ?></option>
               <?php
                   if ($result->num_rows > 0 ) {
                       while ($row = $result->fetch_assoc()) {
                           echo '<option value="'.$row['Firma_Ad'].'">'.$row['Firma_Ad'].'</option>';
                         }
                       }
               ?> 
          </select>

                     

   
  <br>
 
  <label for="urunad" style="background:rgb(57, 85, 136);
          color:#fff;
          padding-left:10px;
          padding-top:10px;
          padding-right:10px;
          padding-bottom:10px;">Adet:</label>
  <select name="miktar<?php echo $i;?>" id="miktar<?php echo $i;?>" class="form-control" onchange="LotChange(this.value,<?php echo $i;?>)"  required>
  
				
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    
    
  </select>
  <br>
  


