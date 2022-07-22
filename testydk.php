<?php
include 'databasebaglanti.php';
// We need to use sessions, so you should always start sessions using the below code.
if(!($_SESSION['yetki']=='Admin')) {

	echo "yetki yeterli değil";
    exit;
}


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM urunler');
// In this case we can use the account ID to get the account info.

$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
?>


<?php

include 'header.php';
?>
		 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Tables</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
</head>
<body>
<div class="container" style="overflow-x:auto;">
    <h2>Urunler</h2>
    <h3>İmport<form action="#" method="POST" enctype="multipart/form-data">
	<input type="file" name="excel">
	<input type="submit" name="submit">
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
				$query="CREATE table urunler (".rtrim($q,",").");";
			}else{
				$query="INSERT INTO urunler (Urunler_Ad,Urunler_Olcut,Urunler_Kod,Urunler_Firma) values (".rtrim($q,",").");";
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

?></h3>
    <table class="table table-fluid" id="myTable"  >
    <thead>
    <tr><th>UrunID</th>
    <th>UrunAd</th>
    <th>UrunKod</th>
    <th>UrunOlcut</th>
    <th>UrunFirma</th>
    <th>UrunQR</th>
    <th>Recete</th>
    <th>Edit</th>
</tr>
    </thead>
    <tbody>
    <?php while ($cikti = $sonuc->fetch_array())
					{if ($cikti["Urunler_Silindi"]==FALSE){?>
    <tr><td><?php echo $cikti["Urunler_ID"];?></td>
    <td><?php echo $cikti["Urunler_Ad"];?></td>
    <td><?php echo $cikti["Urunler_Kod"];?></td>
    <td><?php echo $cikti["Urunler_Olcut"];?></td>
    <td><?php echo $cikti["Urunler_Firma"];?></td>
    <td><img src="qrcodeimages/<?php echo $cikti['Urunler_QR'];?>" alt=""></td>
    <td><a href="recete.php?id=<?php echo $cikti["Urunler_ID"];?>&urunrecete=<?php echo $cikti["Urunler_Recete"];?>&kod=<?php echo $cikti["Urunler_Kod"];?>">Goster</td>
    <td><a href="edit.php?id=<?php echo $cikti["Urunler_ID"];?>">Edit</td>
</tr>
    <?php }} ?>
    </tbody>
    </table>
</div>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
</body>
</html>