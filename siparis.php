<?php
include 'databasebaglanti.php';
// We need to use sessions, so you should always start sessions using the below code.
if(!($_SESSION['yetki']=='Admin')) {

	echo "yetki yeterli değil";
    exit;
}


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM siparis');
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
    <h6 style='text-align: center;'>Import<form action="#" method="POST" enctype="multipart/form-data">
	<input type="file" name="excel" style='width: 20%;
    padding: 15px;
    margin-top: 20px;
    background-color: #3274d6;
    border: 0;
    cursor: pointer;
    font-weight: bold;
    color: #ffffff;
    transition: background-color 0.2s;'>
	<input type="submit" name="submit" style='width: 20%;
    padding: 15px;
    margin-top: 20px;
    background-color: #3274d6;
    border: 0;
    cursor: pointer;
    font-weight: bold;
    color: #ffffff;
    transition: background-color 0.2s;'>
</form>

<?php
if(isset($_FILES['excel']['name'])){
	$con=mysqli_connect("localhost","root","1234","burbant_database");
	include "xlsx.php";
	if($con){
		$excel=SimpleXLSX::parse($_FILES['excel']['tmp_name']);
	
	
	
		print_r($excel->sheetNames());
        for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) { 
        $rowcol=$excel->dimension($sheet);
        $i=0;
        if($rowcol[0]!=1 &&$rowcol[1]!=1){
		foreach ($excel->rows($sheet) as $key => $row) {

			$q="";
			foreach ($row as $key => $cell) {

				if($i==0){
					$q.=$cell. " varchar(50),";
				}else{
					$q.="'".$cell. "',";
				}
			}
			if($i==0){
				$query="CREATE table siparis (".rtrim($q,",").");";
			}else{
        
				$query="INSERT INTO siparis (Siparis_No,Siparis_Urun,Siparis_Miktar,Siparis_Fiyat,Siparis_Teslimtarihi,Siparis_Firma) values (".rtrim($q,",").");";
			}
			echo " $i";
			if(mysqli_query($con,$query))
			{
				echo "true";
			}
            else{
                echo "false";
            }
			echo "<br>";
			$i++;
		}
	}
		}
	}
}
?></h6>
<br>
<h6 style="text-align: center;"><button class="btn btn-primary" name="submit" onclick="pop()">Siparis Ekle</button></h6>
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
			<h3>Siparis Ekle</h3>		
      <?php
      date_default_timezone_set('Europe/Istanbul');
      $tarih = date('d-m-Y H:i:s',time()); ?>
            <form action="insertsiparis.php" method="post">
            Siparis No :  <input type="text"  placeholder=" Siparis No " name="siparisno"><br><br>
							Siparis Not : <input type="text"  placeholder=" Siparis Not " name="siparisnot"><br><br>
              
              Siparis Firma : <?php
  
  $query = "SELECT * FROM firma ORDER BY firma_ad";
  $result = $con->query($query);
   ?>
<select name="siparisfirma" id="siparisfirma"  style="width:250px;" value="">
             <option value=""></option>
                <?php
                    if ($result->num_rows > 0 ) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="'.$row['Firma_Ad'].'">'.$row['Firma_Ad'].'</option>';
                          }
                        }
                ?> 
           </select><br><br>
							Siparis Ürün : <input type="text"  placeholder=" Siparis Ürün Kodu " name="siparisurun"><br><br>
							Siparis Miktar :<input type="text"  placeholder=" Siparis Miktar " name="siparismiktar"><br><br>
							Siparis Sevk Şekli : <select name="siparissevk" id="" value="">
                <option value="Burbant">Burbant</option>
                <option value="KargoAU">KargoUA</option>
                <option value="KargoGU">KargoUG</option>
                <option value="Ceva">Ceva</option>
                <option value="Ambar">Ambar</option>
                <option value="DepoTeslim">DepoTeslim</option>
              </select><br><br>
              Siparis Fiyat :<input type="text"  placeholder=" Siparis Fiyat " name="siparisfiyat"><br><br>
                Siparis Tarihi : <input type="text"  placeholder=" Siparis Tarihi " name="siparistarih" value = "<?php echo $tarih;?>"><br><br>
                Siparis Teslim Tarihi : <input type="text"  placeholder=" Siparis Teslim Tarihi " name="siparisteslimtarih"><br><br>
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
<?php
$stmt = $con->prepare('SELECT * FROM siparis');
// In this case we can use the account ID to get the account info.

$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
?>

    <div class="container">
       <div class="row">
           <div class="col-lg-12">
           <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
           <thead>
    <tr><th>SiparisID</th>
    <th>SiparisNo</th>
    <th>SiparisUrun</th>
    <th>SiparisFirma</th>
    <th>SiparisMiktar</th>
    <th>SiparisSevk</th>
    <th>SiparisFiyat</th>
    <th>SiparisTeslimTarih</th>
    <th>SiparisEkleyen</th>
    <th>SiparisEklemeTarih</th>
    <th>SiparisNot</th>
  
</tr>
    </thead>
    <tbody>
    <?php while ($cikti = $sonuc->fetch_array())
					{if ($cikti["Siparis_Silindi"]==FALSE){?>
    <tr><td><?php echo $cikti["Siparis_ID"];?></td>
    <td><?php echo $cikti["Siparis_No"];?></td>
    <td><?php echo $cikti["Siparis_Urun"];?></td>
    <td><?php echo $cikti["Siparis_Firma"];?></td>
    <td><?php echo $cikti["Siparis_Miktar"];?></td>
    <td><?php echo $cikti["Siparis_Sevk"];?></td>
    <td><?php echo $cikti["Siparis_Fiyat"];?></td>
    <td><?php echo $cikti["Siparis_Teslimtarihi"];?></td>
    <td><?php echo $cikti["Siparis_Ekleyen"];?></td>
    <td><?php echo $cikti["Siparis_Eklemetarih"];?></td>
    <td><?php echo $cikti["Siparis_Not"];?></td>
    
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