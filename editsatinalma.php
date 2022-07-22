<?php


include 'databasebaglanti.php';
$urunid=$_GET['id'];

$stmt = $con->prepare('SELECT * FROM urunler INNER JOIN  tedarikci ON urunler.Urunler_Tedarikci = tedarikci.Tedarikci_ID WHERE Urunler_ID = ?');

$stmt->bind_param('s', $urunid);	
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
				<a href="satinalmaprofil.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="satinalmaguncelle.php"><i class="fas fa-user-circle"></i>Urunler</a>
                <a href="satinalmaguncelle2.php"><i class="fas fa-user-circle"></i>Tedarikciler</a>
			
  
				
                
              
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
    <h1 class="text-center">Düzenle</h1>    
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
            <form action="updateurun.php?id=<?php echo $urunid; ?>" method="post">
						<tr>
							<td>Urun ID:</td>
							<td><?php echo $cikti["Urunler_ID"];?></td>
						</tr>
						<tr>
							<td>Urun Kod:</td>
							<td><input type="text" name="urunkod" id="urunkod" value="<?php echo $cikti["Urunler_Kod"];?>"></td>
						</tr>
						<tr>
							<td>Urun Ad:</td>
							<td><input type="text" name="urunad" id="urunad" value="<?php echo $cikti["Urunler_Ad"];?>"></td>
						</tr>
						<tr>
							<td>Urun Olcut:</td>
							<td><select name="urunolcut" id="">
                                <option value="<?php echo $cikti["Urunler_Olcut"];?>"><?php echo $cikti["Urunler_Olcut"];?></option>
                                    <option value="kg">kg</option>
                                    <option value="adet">adet</option>
                                    <option value="koli">koli</option>
                                    <option value="metre">metre</option>
                                    <option value="m2">m2</option>
                                    <option value="m3">m3</option>
                                    <option value="paket">paket</option>
                                    <option value="diger">diger</option>
                            </select></td>
                            <tr>
                                <td>Son Fiyat :</td>
                            <td><input type="text" name="sonfiyat" value="<?php echo $cikti["Urunler_Sonfiyat"];?>" ><select name="sonfiyattur" id="">
                                <option value="<?php echo $cikti["Urunler_Sonfiyattur"];?>"><?php echo $cikti["Urunler_Sonfiyattur"];?></option>
                                <option value="TL">TL</option>
                                <option value="Dolar">Dolar</option>
                                <option value="Euro">Euro</option>
                            </select></td>
                            </tr>
				  <tr>
                                <td>Son Fiyat 2 :</td>
                            <td><input type="text" name="sonfiyat2" value="<?php echo $cikti["Urunler_Sonfiyat2"];?>" ><select name="sonfiyattur2" id="">
                                <option value="<?php echo $cikti["Urunler_Sonfiyattur2"];?>"><?php echo $cikti["Urunler_Sonfiyattur2"];?></option>
                                <option value="TL">TL</option>
                                <option value="Dolar">Dolar</option>
                                <option value="Euro">Euro</option>
                            </select></td>
                            </tr>
				  <tr>
                                <td>Son Fiyat 3:</td>
                            <td><input type="text" name="sonfiyat3" value="<?php echo $cikti["Urunler_Sonfiyat3"];?>" ><select name="sonfiyattur3" id="">
                                <option value="<?php echo $cikti["Urunler_Sonfiyattur3"];?>"><?php echo $cikti["Urunler_Sonfiyattur3"];?></option>
                                <option value="TL">TL</option>
                                <option value="Dolar">Dolar</option>
                                <option value="Euro">Euro</option>
                            </select></td>
                            </tr>
                            <tr>
                                <td>
                                    Tedarikci : 
                                </td>
                                <td>
                                <select name="tedarikci" id="">
									
                                    <option value="<?php echo $cikti['Tedarikci_ID']?>"><?php echo $cikti['Tedarikci_Ad']?></option>
									<option value="yok">YOK</option>
                                    <?php
$stmt = $con->prepare('SELECT * FROM tedarikci');
// In this case we can use the account ID to get the account info.

$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
?>
                                <?php while ($cikti = $sonuc->fetch_array()) { ?>
                                    <option value="<?php echo $cikti['Tedarikci_ID']?>"><?php echo $cikti['Tedarikci_Ad']?></option>
                                    <?php } ?>
                                </select>
                                </td>
                            </tr>
						
                            
						
				<?php
$stmt = $con->prepare('SELECT * FROM urunler INNER JOIN  tedarikci ON urunler.Urunler_Tedarikci2 = tedarikci.Tedarikci_ID WHERE Urunler_ID = ?');

$stmt->bind_param('s', $urunid);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();
?>
				      <tr>
                                <td>
                                    Tedarikci 2 : 
                                </td>
                                <td>
                                <select name="tedarikci2" id="">
									
                                    <option value="<?php echo $cikti['Tedarikci_ID']?>"><?php echo $cikti['Tedarikci_Ad']?></option>
									<option value="yok">YOK</option>
                                    <?php
$stmt = $con->prepare('SELECT * FROM tedarikci');
// In this case we can use the account ID to get the account info.

$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
?>
                                <?php while ($cikti = $sonuc->fetch_array()) { ?>
                                    <option value="<?php echo $cikti['Tedarikci_ID']?>"><?php echo $cikti['Tedarikci_Ad']?></option>
                                    <?php } ?>
                                </select>
                                </td>
                            </tr>
								<?php
$stmt = $con->prepare('SELECT * FROM urunler INNER JOIN  tedarikci ON urunler.Urunler_Tedarikci3 = tedarikci.Tedarikci_ID WHERE Urunler_ID = ?');

$stmt->bind_param('s', $urunid);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();
?>
				<tr>
                                <td>
                                    Tedarikci 3 : 
                                </td>
                                <td>
                                <select name="tedarikci3" id="">
								
                                    <option value="<?php echo $cikti['Tedarikci_ID']?>"><?php echo $cikti['Tedarikci_Ad']?></option>
										<option value="yok">YOK</option>
                                    <?php
$stmt = $con->prepare('SELECT * FROM tedarikci');
// In this case we can use the account ID to get the account info.

$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
?>
                                <?php while ($cikti = $sonuc->fetch_array()) { ?>
                                    <option value="<?php echo $cikti['Tedarikci_ID']?>"><?php echo $cikti['Tedarikci_Ad']?></option>
                                    <?php } ?>
                                </select>
                                </td>
                            </tr>
				
	<div>
                       
                       <td><button id="submit<?php echo $urunid;?>" >Bitir</button></td></form>
					   <form action="sil.php?id=<?php echo $urunid;?>" method="post">
                       
					   <td><button id="delete<?php echo $urunid;?>" >Sil</button></td>	
                        </form>				
						
				
				</table>
         
           </div>
       </div> 
    </div>
   
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
    <!-- extension responsive -->
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