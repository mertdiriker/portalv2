<?php
$stokid=$_GET['id'];
include('phpqrcode/qrlib.php');
include('databasebaglanti.php');
$stmt = $con->prepare('SELECT * FROM stok WHERE stok_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $stokid);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();
    
?>



<div class="container">
             
  <table class="table">
    <thead>
      <tr>
        <th>STOK ID:</th>
        <th><?php echo $stokid;?></th>  
        <th><div><img width="200" src="qrread/etiketqr.php?Qr=<?php echo $stokid;?>"></div>
</th>   
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td>Ad</td>
        <td><?php echo $cikti['stok_urunid'];?></td>
       
      </tr>
      <tr>
        <td>Miktar</td>
        <td><?php echo $cikti['stok_miktar'];?></td>
  
      </tr>
      <tr>
        <td>Firma</td>
        <td><?php echo $cikti['stok_firmaid'];?></td>
  
      </tr>
 
 
    </tbody>
  </table>
</div>

</body>
</html>