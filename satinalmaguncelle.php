<?php
include 'databasebaglanti.php';

if(!($_SESSION['yetki']=='onay')) {

	echo "yetki yeterli değil";
    exit;
}



$stmt = $con->prepare('SELECT * FROM urunler');


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
			
                <a href="satinalmaguncelle.php"><i class="fas fa-user-circle"></i>Urunler</a>
                <a href="satinalmaguncelle2.php"><i class="fas fa-user-circle"></i>Tedarikciler</a>
			<a href="satinalma.php"><i class="fas fa-user-circle"></i>Talep</a>
			
			
  
				
                
              
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
	$con=mysqli_connect("localhost","mert","huker6123","burbant_database");
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
				$query="CREATE table urunler (".rtrim($q,",").");";
			}else{
				$query="INSERT INTO urunler (Urunler_Tedarikci,Urunler_Kod,Urunler_Ad,Urunler_Sonfiyat,Urunler_Sonfiyattur) values (".rtrim($q,",").");";
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
<h6 style="text-align: center;"><button class="btn btn-primary" name="submit" onclick="pop()">Ürün Ekle</button></h6>
<br>
<div id='addbox' style='
width:450px;
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
<form action="insertguncelle.php" method="post">
                                <input type="text"  placeholder=" UrunKod " name="urunkod">
                                <br>
                                <br>
                                
                                <input type="text"  placeholder=" UrunAdı " name="urunad">
                                <br>
                                <br>
                                <select name="urunolcut" id="">
                                    <option value="">Birim Seç</option>
                                    <option value="kg">kg</option>
                                    <option value="adet">adet</option>
                                    <option value="koli">koli</option>
                                    <option value="metre">metre</option>
                                    <option value="m2">m2</option>
                                    <option value="m3">m3</option>
                                    <option value="paket">paket</option>
                                    <option value="diger">diger</option>
                                </select>
                                <br>
                                <br>
                                <?php
$stmt = $con->prepare('SELECT * FROM tedarikci');


$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
?>
                                <select name="tedarikci" id="">
                                    <option value="">Tedarikci Seç</option>
                                <?php while ($cikti = $sonuc->fetch_array()) { ?>
                                    <option value="<?php echo $cikti['Tedarikci_ID'];?>"><?php echo $cikti['Tedarikci_Ad'];?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <br>
                                <input type="text" placeholder=" Son Fiyat" name="sonfiyat">
                                <select name="sonfiyattur" id="">
                                    <option value="TL">TL</option>
                                    <option value="Dolar">Dolar</option>
                                    <option value="Euro">Euro</option>
                                </select>
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
<h6 style="text-align: center;"><button class="btn btn-primary" name="submit" onclick="pop2()">Tedarikci Ekle</button></h6>
<br>
<div id='addbox2' style='
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
<form action="inserttedarikci.php" method="post">
                                <input type="text"  placeholder="Tedarikci Ad" name="tedarikci">
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
                                onclick="pop2()" >Kapat</a>
                            </form>

</div>
<script type='text/javascript'>
var c=0;
function pop2() {
  if(c==0){
    document.getElementById("addbox2").style.display = "block";
    c=1;
  }
  else{
    document.getElementById("addbox2").style.display = "none";
    c=0;

  }
}
</script>
<?php
$stmt = $con->prepare('SELECT * FROM urunler INNER JOIN  tedarikci ON urunler.Urunler_Tedarikci = tedarikci.Tedarikci_ID');

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
    <tr><th>UrunID</th>
    <th>UrunAd</th>
    <th>UrunKod</th>
    <th>UrunOlcut</th>
    <th>UrunTedarikci</th>
    <th>SonFiyat</th>
    <th>İslem</th>

    
    
</tr>
    </thead>
    <tbody>
    <?php while ($cikti = $sonuc->fetch_array())
					{if ($cikti["Urunler_Silindi"]==FALSE){?>
    <tr><td><?php echo $cikti["Urunler_ID"];?></td>
    <td><?php echo $cikti["Urunler_Ad"];?></td>
    <td><?php echo $cikti["Urunler_Kod"];?></td>
    <td><?php echo $cikti["Urunler_Olcut"];?></td>
    <td><?php echo $cikti["Tedarikci_Ad"];?></td>
    <td><?php echo $cikti["Urunler_Sonfiyat"]."-".$cikti["Urunler_Sonfiyattur"];?></td>
    <td><a href="editsatinalma.php?id=<?php echo $cikti["Urunler_ID"];?>">Düzenle</td>
    
   

    

    <?php }} ?>
   
    
    
    
</tr>
   
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