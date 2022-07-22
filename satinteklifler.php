<?php


include 'databasebaglanti.php';
$talepid=$_GET['id'];

$stmt = $con->prepare('SELECT * FROM satinalma WHERE satinalma_ID = ?');

$stmt->bind_param('s', $talepid);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style2.css" rel="stylesheet" type="text/css">
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
  
				
   
        <a href="satinalma.php"><i class="fas fa-user-circle"></i>Talep Oluştur</a>
				<a href="satinalmatalepler.php"><i class="fas fa-user-circle"></i>Talepler</a>

				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <title></title>

    <style>
    
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr{background-color: white}

th {
  background-color: #2f3947;
  color: white;
}
</style>
  </head>
  <body>
    <h1 class="text-center">Teklif Gir</h1>    
    <?php 
    if($_SESSION['yetki']=='teklif' && $cikti['satinalma_Durum']=='Teklif Arastirmasinda'){
    ?>
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
            <form action="updatesatinalma.php?id=<?php echo $talepid; ?>" method="post">
						
            
                        <tr style="background:rgb(57, 85, 136);
                        color:white;">
							<td>Talep ID:</td>
							<td><?php echo $cikti["satinalma_ID"];?></td>
              <td>Açıklama</td>
							<td>Termin Süresi<td>
						</tr>
						<tr>
							<td>Firma 1:</td>
							<td><input type="text" name="firma1" id="firma1" value="<?php echo $cikti["satinalma_Teklif1firma"];?>"></td>
              <td><input type="text" name="aciklama1" value="<?php echo $cikti["satinalma_TeklifAciklama1"];?>"></td>
							 <td><input type="text" name="termin1" value="<?php echo $cikti["satinalma_Termin1"];?>"></td>
						</tr>
						<tr>
							<td>Fiyat:</td>
							<td><input type="text" name="fiyat1" id="fiyat1" value="<?php echo $cikti["satinalma_Teklif1fiyat"];?>">&emsp;
<select name="fiyattur1" id="fiyattur1">
	<option value="<?php echo $cikti["satinalma_Teklif1fiyattur"];?>"><?php echo $cikti["satinalma_Teklif1fiyattur"];?></option>
	<option value="Euro">Euro</option>
	<option value="Dolar">Dolar</option>
	<option value="TL">TL</option>
</select></td>
						</tr>
						<tr>
							<td>Firma 2:</td>
							<td><input type="text" name="firma2" id="firma2" value="<?php echo $cikti["satinalma_Teklif2firma"];?>"></td>
              <td><input type="text" name="aciklama2" value="<?php echo $cikti["satinalma_TeklifAciklama2"];?>"></td>
							<td><input type="text" name="termin2" value="<?php echo $cikti["satinalma_Termin2"];?>"></td>
						</tr>
						<tr>
							<td>Fiyat:</td>
							<td><input type="text" name="fiyat2" id="fiyat2" value="<?php echo $cikti["satinalma_Teklif2fiyat"];?>">&emsp;<select name="fiyattur2" id="fiyattur2">
	<option value="<?php echo $cikti["satinalma_Teklif2fiyattur"];?>"><?php echo $cikti["satinalma_Teklif2fiyattur"];?></option>
	<option value="Euro">Euro</option>
	<option value="Dolar">Dolar</option>
	<option value="TL">TL</option>
</select></td>
						</tr>
            <tr>
							<td>Firma 3:</td>
							<td><input type="text" name="firma3" id="firma3" value="<?php echo $cikti["satinalma_Teklif3firma"];?>"></td>
              <td><input type="text" name="aciklama3" value="<?php echo $cikti["satinalma_TeklifAciklama3"];?>"></td>
				<td><input type="text" name="termin1" value="<?php echo $cikti["satinalma_Termin3"];?>"></td>
						</tr>
						<tr>
							<td>Fiyat:</td>
							<td><input type="text" name="fiyat3" id="fiyat3" value="<?php echo $cikti["satinalma_Teklif3fiyat"];?>">&emsp;<select name="fiyattur3" id="fiyattur3">
	<option value="<?php echo $cikti["satinalma_Teklif3fiyattur"];?>"><?php echo $cikti["satinalma_Teklif3fiyattur"];?></option>
	<option value="Euro">Euro</option>
	<option value="Dolar">Dolar</option>
	<option value="TL">TL</option>
</select></td>
						</tr>
						

                       
                       <td><button class="btn btn-primary" name="submit">Onayla ve Bitir</button></td></form>
                       <form action="satinalmatalepler.php"><tr>
                       <td><button class="btn btn-primary" name="submit">Geri</button></td>
                       </tr>
                       </form>
					
				
				</table>
         
           </div>
       </div> 
    </div>
    <?php
    } else {?>
 
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
          
						
            
                        <tr style="background:rgb(57, 85, 136);
                        color:white;">
							<td>Talep ID:</td>
							<td><?php echo $cikti["satinalma_ID"];?></td>
							<td>Aciklama</td>
							<td>Termin</td>
						</tr>
						<tr>
							<td>Firma 1:</td>
							<td><?php echo $cikti["satinalma_Teklif1firma"];?></td>
							<td><?php echo $cikti["satinalma_TeklifAciklama1"];?></td>
							<td><?php echo $cikti["satinalma_Termin1"];?></td>
						</tr>
						<tr>
							<td>Fiyat:</td>
							<td><?php echo $cikti["satinalma_Teklif1fiyat"];?>-<?php echo $cikti["satinalma_Teklif1fiyattur"];?></td>
						</tr>
						<tr>
							<td>Firma 2:</td>
							<td><?php echo $cikti["satinalma_Teklif2firma"];?></td>
							<td><?php echo $cikti["satinalma_TeklifAciklama2"];?></td>
							<td><?php echo $cikti["satinalma_Termin2"];?></td>
						</tr>
						<tr>
							<td>Fiyat:</td>
							<td><?php echo $cikti["satinalma_Teklif2fiyat"];?>-<?php echo $cikti["satinalma_Teklif2fiyattur"];?></td>
						</tr>
            <tr>
							<td>Firma 3:</td>
							<td><?php echo $cikti["satinalma_Teklif3firma"];?></td>
							<td><?php echo $cikti["satinalma_TeklifAciklama3"];?></td>
				<td><?php echo $cikti["satinalma_Termin3"];?></td>
						</tr>
						<tr>
							<td>Fiyat:</td>
							<td><?php echo $cikti["satinalma_Teklif3fiyat"];?>-<?php echo $cikti["satinalma_Teklif3fiyattur"];?></td>
						</tr>
						

                <form action="satinalmatalepler.php"><tr>
                       <td><button class="btn btn-primary" name="submit">Geri</button></td>
                       </tr>
					           </form>
				 <?php $stmt = $con->prepare('SELECT * FROM satinalma INNER JOIN  urunler ON satinalma.satinalma_Kod = urunler.Urunler_Kod WHERE satinalma_ID = ?');

$stmt->bind_param('s', $talepid);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();
?>
					
				<tr>
                      	<td>SonFiyat   <?php echo $cikti['Urunler_Sonfiyat'].'-'.$cikti['Urunler_Sonfiyattur'];?></td>
				
                       </tr>
			
            
				
				</table>
         
           </div>
       </div> 
    </div>
    <?php
    }
    ?>
   
    



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      

    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    

      
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    } );  
    
    </script>
  
      
      
  </body>
</html>