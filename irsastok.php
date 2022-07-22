<?php
include 'databasebaglanti.php';
// We need to use sessions, so you should always start sessions using the below code.
if(!($_SESSION['yetki']=='Admin')) {

	echo "yetki yeterli değil";
    exit;
}


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM stok');
// In this case we can use the account ID to get the account info.

$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
?>


<?php

include 'header.php';
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
    
    <div class="container" style="background:white;">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
            <thead>
    <tr>
    <th>StokID</th>
    <th>Stok Adı</th>
    <th>Stok Kod</th>
    <th>Firma</th>
    <th>Lokasyon</th>
    <th>Olcut</th>
    <th>Tur</th>
    <th>İrsTarih</th>
    <th>İrsNo</th>
    <th>ÜrtTarih</th>
    <th>LotNumarası</th>
    <th>Ekliyen</th>
    <th>EklemeTarih</th>
    <th></th>
    <th></th>
</tr>
    </thead>
    <tbody>
    <?php while ($cikti = $sonuc->fetch_array())
					{if ($cikti["stok_silindi"]==FALSE){?>
    <tr>
    <td><?php echo $cikti["stok_id"];?></td>
    
    <td><?php echo $cikti["stok_urunid"];?></td>
    <td><?php echo $cikti["stok_urunkod"];?></td>
    <td><?php echo $cikti["stok_firmaid"];?></td>
    <td><?php echo $cikti["stok_lokasyonid"];?></td>
    <td><?php echo $cikti["stok_miktar"];?></td>
    <td><?php echo $cikti["stok_olcutturu"];?></td>
    <td><?php echo $cikti["stok_irsaliyetarihi"];?></td>
    <td><?php echo $cikti["stok_irsaliyeno"];?></td>
    <td><?php echo $cikti["stok_uretimtarihi"];?></td>
    <td><?php echo $cikti["stok_lotnumarasi"];?></td>
    <td><?php echo $cikti["stok_ekliyen"];?></td>
    <td><?php echo $cikti["stok_eklemetarih"];?></td>
    <td><a href="stokedit.php?id=<?php echo $cikti["stok_id"];?>">Düzenle</td>
    <td><a href="etiketbas.php?id=<?php echo $cikti["stok_id"];?>">Etiket Bas</td>
    
</tr>
    <?php } } ?>
    </tbody>
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