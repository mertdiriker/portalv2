<?php
include 'databasebaglanti.php';
// We need to use sessions, so you should always start sessions using the below code.



// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM kargo');
// In this case we can use the account ID to get the account info.

$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
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
  
				
  <a href="satinalmaprofil.php"><i class="fas fa-user-circle"></i>Profil</a>
  <a href="satinalma.php"><i class="fas fa-user-circle"></i>Talep Oluştur</a>
          <a href="satinalmatalepler.php"><i class="fas fa-user-circle"></i>Talepler</a>
          <a href="kargotakip.php"><i class="fas fa-user-circle"></i>Kargo Takip</a>
  

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
    
<div>
<h6 style="margin-top:3em;text-align: center;"><button class="btn btn-primary" name="submit" onclick="pop()">Kargo Ekle</button></h6>
<br>
<div id='addbox' style='
width:380px;
overflow:hidden;
background: #f1f1f1;
box-shadow: 0 0 20px black;
border-radius: 8px;
position:absolute;
top: 50%;
left: 50%;
transform:translate(-50%,-50%);
z-index:9999;
padding:10px;
text-align:center;
display:none;



'>
<form action="insertkargo.php" method="post">
                                <label for="">Urun : </label><input type="text"  placeholder=" Urun " name="urun">
                                <br>
                                <br>
                                <label for="">Tur : </label><select name="kargotur" id="kargotur" style="width:10em;">
                                    <option value="Gelen">Gelen</option>
                                    <option value="Giden">Giden</option>
                                </select>
                                
                                <br>
                                <br>
                             
                                <label for="">Tarih : </label><input type="date"  placeholder=" Tarih " name="kargotarih" value="">
                                <br>
                                <br>
                                <label for="">Kisi : </label><input type="text"  placeholder=" Kisi " name="kargokisi">
                                <br>
                                <br>
                                <label for="">Firma : </label><input type="text"  placeholder=" Firma " name="kargofirma">
                                <br>
                                <br>
                                <button class="btn btn-primary" name="submit">Ekle</button>
                                <a class='close' style='
                                font-size: 15px;
                                color:white;
                                padding: 10px 20px;
                                cursor:pointer;
                                background: red;
                                display:inline-block;
                                border-radius:4px;
                                '
                                onclick="pop()" >Kapat</a>
                            </form>

</div>
<script type='text/javascript'>
var c=0;
function pop() {
  if(c==0){
    document.getElementById("addbox").style.display = "block";
    c=1;
  }
  else{
    document.getElementById("addbox").style.display = "none";
    c=0;

  }
}
</script>
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
            <thead>
    <tr><th>KargoID</th>
    <th>KargoUrun</th>
    <th>KargoTarih</th>
    <th>KargoTur</th>
    <th>KargoKisi</th>
    <th>KargoFirma</th>
    <th>Sil</th>
  
</tr>
    </thead>
    <tbody>
    <?php while ($cikti = $sonuc->fetch_array())
				{if ($cikti["kargo_Silindi"]==FALSE){?>
    <tr><td><?php echo $cikti["kargo_ID"];?></td>
    <td><?php echo $cikti["kargo_Urun"];?></td>
    <td><?php echo $cikti["kargo_Tarih"];?></td>
    <td><?php echo $cikti["kargo_Tur"];?></td>
    <td><?php echo $cikti["kargo_Kisi"];?></td>
    <td><?php echo $cikti["kargo_Firma"];?></td>
    <td><a href="kargotakipsil.php?id=<?php echo $cikti["kargo_ID"];?>">Sil</td>
  
    
</tr>
    <?php } }?>
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