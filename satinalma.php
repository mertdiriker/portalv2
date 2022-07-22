<?php
include 'databasebaglanti.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style2.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<style type="text/css">
	body{
		background-image:url(bg.png);
		background-size:cover;
		background-attachment: fixed;
	}
	</style>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body class="loggedin">
		<nav class="navtop" style="overflow-x:auto;">
    <div>
				<h1> <img src="portal.png"></h1>
  
				
        <a href="satinalmaprofil.php"><i class="fas fa-user-circle"></i>Profil</a>
        <a href="satinalma.php"><i class="fas fa-user-circle"></i>Talep Oluştur</a>
				<a href="satinalmatalepler.php"><i class="fas fa-user-circle"></i>Talepler</a>
		<a href="satinalmaguncelle.php"><i class="fas fa-user-circle"></i>Güncelle</a>
        

				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>



<?php
    $stmt = $con->prepare('SELECT * FROM urunler ORDER BY Urunler_Ad');
    // In this case we can use the account ID to get the account info.

    $stmt->execute();
    $sonuc = $stmt->get_result();
   
    $stmt->close();
   
    $cikti = $sonuc->fetch_array();
    sort($cikti);
   
    
   

?>    



    <div class="content" style="overflow-x:auto;">
          <div style="overflow-x:auto;">
      <h3 style="background:rgb(57, 85, 136);
      color:#fff;
      padding-top:20px;
      padding-bottom:20px;">&emsp;SATIN ALMA TALEP</h3>	

    <div>
      <br>
      <br>
     <div><form class="" action="satinalmatalepgiris.php" method="post" enctype="multipart/form-data">
     <select style="width:230px;" name="urun" id="urun" >
       <option value="">URUN SEÇ</option>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["Urunler_Ad"];?>"><?php echo $cikti["Urunler_Ad"];?></option>
    <?php  }  ?>
  </select>

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
		   <label for="">İstenen Teslim Tarih : &emsp;&emsp;: </label>
		  <input type="date" name="istenentarih" required>
		  <br>
         <br>
         <label for="">PDF seç &emsp;&emsp;: </label>
        &emsp;&emsp;<input id="pdf" type="file" name="pdf" value="" ><br><br>
         
         <br>
         <button class="btn btn-primary" name="submit">Talep Oluştur</button>
        </form>
     </div>
    
      </form>
      <form class="" action="satinalmatalepgiris.php" method="post" enctype="multipart/form-data">
   <input type="text" placeholder="Urun Adı" name="urun">

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
		  <label for="">İstenen Teslim Tarih : &emsp;&emsp;: </label>
		  <input type="date" name="istenentarih" required>
		  <br>
      
         <br>
         <label for="">PDF seç &emsp;&emsp;: </label>
        &emsp;&emsp;<input id="pdf" type="file" name="pdf" value="" ><br><br>
         
         <br>
         <button class="btn btn-primary" name="submit">Talep Oluştur</button>
        </form>
     </div>
    
      </form>
      <div id="direk">
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
  <option value="">Tedarikci Seç</option>
  <?php while ($cikti = $sonuc->fetch_array())
				{ ?>
    <option value="<?php echo $cikti["Tedarikci_ID"];?>"><?php echo $cikti["Tedarikci_Ad"];?></option>
    <?php  }  ?>
  </select>


      </div>

    </div>

  </body>


  <script type="text/javascript">
  function TedarikChange(id){
    $.ajax({
      type:'post',
      url: 'satinalmatedarikchange.php',
      data : { tedarikci : id},
      success : function(data){
         $('#direk').html(data);
      }

    })
  }

  

    
    </script>
    <script type="text/javascript">
  function UrunChange(id,tid){
    $.ajax({
      type:'post',
      url: 'satinalmaurunchange.php',
      data : { urun : id ,tedarikci : tid},
      success : function(data){
         $('#direk').html(data);
      }

    })
  }

  

    
    </script>