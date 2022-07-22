<?php
include 'databasebaglanti.php';
// We need to use sessions, so you should always start sessions using the below code.
if(!($_SESSION['yetki']=='Admin')) {

	echo "yetki yeterli değil";
    exit;
}


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM personel');
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
    <h1 class="text-center"></h1>
    
<br>
<h6 style="text-align: center;"><button class="btn btn-primary" name="submit" onclick="pop()">Personel Ekle</button></h6>
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
<?php if($_SESSION['yetki']=='Admin'){?>
			<div>
			<h3>Personel Ekle</h3>		
			<form action="insertpersonel.php" method="post">
                                <input type="text"  placeholder=" Personel Ad " name="personelad"><br><br>
								<input type="text"  placeholder=" Personel Soyad " name="personelsoyad"><br><br>
								<input type="text"  placeholder=" Personel Mail " name="personelmail"><br><br>
								<input type="text"  placeholder=" Personel Tel " name="personeltel"><br><br>
								<input type="text"  placeholder=" Personel Firma " name="personelfirma"><br><br>
                <input type="password"  placeholder=" Personel Şifre " name="personelsifre"><br><br>
								
                                
                                <button class="btn btn-primary" name="submit">Ekle</button>
                                <a class='close' style='
                                font-size: 20px;
                                color:white;
                                padding: 10px 30px;
                                cursor:pointer;
                                background: red;
                                display:inline-block;
                                border-radius:4px;
                                '
                                onclick="pop()" >Close</a>
                            </form>
							<?php  } ?>           
				
			</div>

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
    <tr>
    <th>Personel ID</th>
    <th>Personel AD</th>
    <th>Personel Soyad</th>
    <th>Personel Firma</th>
    <th>Personel Mail</th>
    <th>Personel Tel</th>
    <th>Personel Yetki</th>
    <th>Personel Ekleyen</th>
    <th>Personel Eklemetarih</th>
</tr>
    </thead>
    <tbody>
    <?php while ($cikti = $sonuc->fetch_array())
					{if ($cikti["Personel_Silindi"]==FALSE){?>
    <tr>

    <td><?php echo $cikti["Personel_ID"];?></td>
    <td><?php echo $cikti["Personel_Ad"];?></td>
    <td><?php echo $cikti["Personel_Soyad"];?></td>
    <td><?php echo $cikti["Personel_Firma"];?></td>
    <td><?php echo $cikti["Personel_Mail"];?></td>
    <td><?php echo $cikti["Personel_Tel"];?></td>
    <td><?php echo $cikti["Personel_Yetki"];?></td>
    <td><?php echo $cikti["Personel_Ekleyen"];?></td>
    <td><?php echo $cikti["Personel_Eklemetarih"];?></td>

    </tr>
    <?php }} ?>
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