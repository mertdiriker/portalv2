<?php
// We need to use sessions, so you should always start sessions using the below code.

include 'databasebaglanti.php';
$urunid=$_GET['id'];
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM urunler WHERE Urunler_ID = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $urunid);	
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
    <h1 class="text-center">Düzenle</h1>    
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
            <form action="update.php?id=<?php echo $urunid; ?>" method="post">
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
							<td><input type="text" name="urunolcut" id="urunolcut" value="<?php echo $cikti["Urunler_Olcut"];?>"></td>
							<div>
                            
						</tr>

                       
                       <td><button id="submit<?php echo $cikti["Urunler_ID"];?>" >Bitir</button></td></form>
					   <form action="sil.php?id=<?php echo $cikti["Urunler_ID"];?>" method="post">
					   <td><button id="delete<?php echo $cikti["Urunler_ID"];?>" >Sil</button></td>	
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