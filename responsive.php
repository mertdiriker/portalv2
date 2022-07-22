<?php
// We need to use sessions, so you should always start sessions using the below code.
$urunid='2';
$urunkod='465';
include 'databasebaglanti.php';


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
    table thead{
        background-color: #38ef7d;        
    }
    </style>
  </head>
  <body>
    <h1 class="text-center">Düzenle</h1>    
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
            <?php 
 
 $stmt = $con->prepare('SELECT * FROM urunrecete WHERE Urunrecete_UrunID = ?');

 $stmt->bind_param('s', $urunkod);	
 $stmt->execute();
 $sonuc = $stmt->get_result();
 $stmt->fetch();
 $stmt->close();
 
    while ($cikti = $sonuc->fetch_array())
    {if ($cikti["Urunrecete_Silindi"]==FALSE){?>

           
            <tr>
            <td>Urun:</td>
            <td><?php echo $cikti["Urunrecete_Urun2ID"];?></td>
           
            <td>Miktar:</td>
            <td><?php echo $cikti["Urunrecete_Miktar"];?></td>
            

            <td>
                <form action="silrecete.php?id=<?php echo $cikti["Urunrecete_Urun2ID"];?>&id2=<?php echo $cikti["Urunrecete_UrunID"];?>" method="post">
                <button class="btn btn-primary" name="submit">Çıkar</button>
       
            </td>
        </tr>
        <?php } } ?>
                       
        </table>
<form action="test.php" method="post">
     <button class="btn btn-primary" name="submit">Geri</button>
                    </form>



  </div>          
						
				
                        
				</table>
         
                <div class="content">
</body>
    <?php
    $stmt = $con->prepare('SELECT * FROM urunler');
    // In this case we can use the account ID to get the account info.

    $stmt->execute();
    $sonuc = $stmt->get_result();
    $stmt->fetch();
    $stmt->close();
    $cikti = $sonuc->fetch_array();
?>    

    <form action="insertrecete.php?id=<?php echo $urunid;?>&kod=<?php echo $urunkod;?>" method="post">
    <label for="urunad">Urun Seç:</label>
  <select name="urunid2" id="urunler">
  <?php while ($cikti = $sonuc->fetch_array())
					{if ($cikti["Urunler_Silindi"]==FALSE){?>
    <option value="<?php echo $cikti["Urunler_Ad"];?>"><?php echo $cikti["Urunler_Ad"];?></option>
    <?php  } } ?>
  </select>
    
    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;<input type="text"  placeholder=" Urun Miktarı " name="urunmiktar">
    <br>
    <br>

    
                        
    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;<button class="btn btn-primary" name="submit">Ekle</button></form>
     <form action="test.php" method="post">
     &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;<button class="btn btn-primary" name="submit">Bitir</button>
                    </form>
     
                   

            
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