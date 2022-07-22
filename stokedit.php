<?php
// We need to use sessions, so you should always start sessions using the below code.

include 'databasebaglanti.php';
$stokid=$_GET['id'];
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM stok WHERE stok_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $stokid);	
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
$cikti = $sonuc->fetch_array();

include "header.php";

?>



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
    <h1 class="text-center">Stok Düzenle</h1>    
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
            <form action="updatestok.php?id=<?php echo $stokid; ?>" method="post">
						<tr>
							<td>Stok ID:</td>
							<td><?php echo $cikti["stok_id"];?></td>
						</tr>
            <tr>
							<td>Stok Kodu:</td>
							<td><input type="text" name="stokkod" id="stokkod" value="<?php echo $cikti["stok_urunkod"];?>"></td>
						</tr>
						<tr>
							<td>Stok Ad:</td>
							<td><input type="text" name="stokad" id="stokad" value="<?php echo $cikti["stok_urunid"];?>"></td>
						</tr>
						<tr>
							<td>Stok Firma:</td>
							<td><input type="text" name="stokfirma" id="stokfirma" value="<?php echo $cikti["stok_firmaid"];?>"></td>
						</tr>
						<tr>
							<td>Stok Lokasyon:</td>
							<td><input type="text" name="stoklokasyon" id="stoklokasyon" value="<?php echo $cikti["stok_lokasyonid"];?>"></td>      
						</tr>
                        <tr>
							<td>Stok Miktar:</td>
							<td><input type="text" name="stokmiktar" id="stokmiktar" value="<?php echo $cikti["stok_miktar"];?>">&emsp;<?php echo $cikti['stok_olcutturu']?></td>      
						</tr>
                        <tr>
							<td>Stok İrsaliye Tarihi:</td>
							<td><input type="date" name="stokirstarih" id="stokirstarih" value="<?php echo $cikti["stok_irsaliyetarihi"];?>"></td>      
						</tr>
                        <tr>
							<td>Stok İrsaliye No:</td>
							<td><input type="text" name="stokirsno" id="stokirsno" value="<?php echo $cikti["stok_irsaliyeno"];?>"></td>      
						</tr>
                        <tr>
							<td>Stok LotNumarası:</td>
							<td><input type="text" name="stoklot" id="stoklot" value="<?php echo $cikti["stok_lotnumarasi"];?>"></td>      
						</tr>
                        <tr>
							<td>Stok Üretim Tarihi:</td>
							<td><input type="date" name="stokurttarih" id="stokurttarih" value="<?php echo $cikti["stok_uretimtarihi"];?>"></td>      
						</tr>
            <tr>
							<td>Stok Tedarikci:</td>
							<td><input type="date" name="stoktedarikci" id="stoktedarikci" value="<?php echo $cikti["stok_tedarikci"];?>"></td>      
						</tr>
              
 




                       
                       <td><button id="submit<?php echo $cikti["stok_id"];?>" >Bitir</button></td></form>
					   <form action="stoksil.php?id=<?php echo $cikti["stok_id"];?>" method="post">
					   <td><button id="delete<?php echo $cikti["stok_id"];?>" >Sil</button></td>	
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