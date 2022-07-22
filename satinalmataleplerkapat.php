<?php
include 'databasebaglanti.php';
// We need to use sessions, so you should always start sessions using the below code.


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT * FROM satinalma INNER JOIN personel ON satinalma.satinalma_Talepci = personel.Personel_ID');
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
  
				
   
        <a href="satinalma.php"><i class="fas fa-user-circle"></i>Talep Oluştur</a>
				<a href="satinalmatalepler.php"><i class="fas fa-user-circle"></i>Talepler</a>

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
  
</div>

<div class="content" style="width:1500px;">
          <div style="width:1500px;">
      <h3 style="background:rgb(57, 85, 136);
      color:#fff;
      padding-top:20px;
      padding-bottom:20px;">&emsp;SATIN ALMA TALEPLERİ</h3>	

     <div>
      <div style="background:rgb(57, 85, 136);
      color:white;">
        <br>&emsp; &emsp;
      <a style="background:#9b6db0;color:black;" href="satinalmatalepleronaybekle.php">Onay Bekleyenler</a>
        &emsp; &emsp;
        <a style="background:#6459f7;
      color:black;" href="satinalmatalepleronaylalanlar.php">Onaylananlar</a>
        &emsp; &emsp;
        <a style="background:lightgreen;color:black;" href="satinalmataleplerarastirma.php">Araştırmada Olanlar</a>
        &emsp; &emsp;
        <a style="background:yellow;color:black;" href="satinalmataleplertamam.php">Siparişi Verilenler</a>
             &emsp; &emsp;
        <a style="background:black;
      color:white;" href="satinalmataleplerkapat.php">Siparişi Kapananlar</a>
            &emsp; &emsp;
		   <a style="background:red;
      color:white;" href="satinalmaredler.php">Reddedilenler</a>
            &emsp; &emsp;
        <a style="background:#2f3947;
      color:white;" href="satinalmatalepler.php">Hepsi</a>
          <br>
          <br>
      </div>
    
    <div class="container" style="width:1500px;">
       <div class="row">
           <div class="col-lg-12">
           <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
           <thead>
    <tr>
    <th>Talep ID</th>
    <th>Urun</th>
    <th>Adet</th>
    <th>Birim</th>
		  <th>Durum</th>
    <th>Tarih</th>
    <th>Firma</th>
		<th>İstenen Tarih</th>
	<th>Aciklama</th>
  <th>PDF</th>
    <th>TalepSahibi</th>
	<th>Teklifler</th>
  <th>Teslimat</th>

  <th>Onay</th>
  <th>Siparis Tarih|</th>
		<th>Sil</th>
  

    
    


</tr>
    </thead>
    <tbody>
    <?php while ($cikti = $sonuc->fetch_array())
					{ if($cikti['satinalma_Durum']=='Siparis Kapatildi' && $cikti["satinalma_Silindi"]==FALSE) {?>
    <tr>

    <td><?php echo $cikti["satinalma_ID"];?></td>
    <td><?php echo $cikti["satinalma_Urun"];?></td>
    <td><?php echo $cikti["satinalma_Adet"];?></td>
    <td><?php echo $cikti["satinalma_Talepbirim"]?></td>
		<?php if($cikti["satinalma_Durum"]=="Teklif Arastirmasinda") { ?>
		<td style="background:lightgreen;"><?php echo $cikti["satinalma_Durum"];?>
			<?php } ?>
			<?php if($cikti["satinalma_Durum"]=="Red") { ?>
		<td style="background:red;"><?php echo $cikti["satinalma_Durum"];?>
			<?php } ?>
			<?php if($cikti["satinalma_Durum"]=="Onay Bekleniyor") { ?>
		<td style="background:#9b6db0;"><?php echo $cikti["satinalma_Durum"];?>
			<?php } ?>
			<?php if($cikti["satinalma_Durum"]=="Siparis Kapatildi") { ?>
		<td style="background:black;color:white;"><?php echo $cikti["satinalma_Durum"];?>
			<?php } ?><?php if($cikti["satinalma_Durum"]=="Siparis verildi") { ?>
		<td style="background:yellow;"><?php echo $cikti["satinalma_Durum"];?>
			<?php } ?>
			<?php if($cikti["satinalma_Durum"]=="Siparis verilmesi bekleniyor") { ?>
		<td style="background:#6459f7;"><?php echo $cikti["satinalma_Durum"];?>
			<?php } ?>
<?php
if($_SESSION['yetki']=='teklif' && $cikti["satinalma_Durum"]=='Sipariş verilmesi bekleniyor'){ ?>
<a href="satinalmasiparis.php?id=<?php echo $cikti["satinalma_ID"];?>">&emsp;&emsp;Sipariş verildi
<?php } ?>

</td>
    <td><?php echo $cikti["satinalma_Taleptarih"];?></td>
    <td><?php echo $cikti["satinalma_Firma"];?></td>
		<td><?php echo $cikti["satinalma_Istenentarih"];?></td>
	<td><?php echo $cikti["satinalma_Aciklama"];?></td>
  <td><a href="satinalmapdfdisplay.php?id=<?php echo $cikti["satinalma_ID"];?>">PDF'i Gör</a></td>
    <td><?php echo $cikti["Personel_Ad"].$cikti["Personel_Soyad"];?></td>
	<td><a href="satinteklifler.php?id=<?php echo $cikti["satinalma_ID"];?>">Teklifler</td>
  <td><a href="satinalmateslimat.php?id=<?php echo $cikti["satinalma_ID"];?>">Teslimat</a></td>
  
  <td><?php echo $cikti["satinalma_Onay"];?>
  <?php if($_SESSION['yetki']=='onay' && $cikti['satinalma_Durum']=='Onay Bekleniyor') {?>
    <form action="satinalmaonay.php?id=<?php echo $cikti["satinalma_ID"];?>" method="post">
  <input type="text" name="not" placeholder="Not">
  <select name="sayi" id="sayi">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select>
  <button class="btn btn-primary" name="submit">Onayla</button>
</form>
<form action="satinalmared.php?id=<?php echo $cikti["satinalma_ID"];?>" method="post">
<input type="text" name="not" placeholder="Not">
<button class="btn btn-primary" name="submit">Reddet</button>
</form>
</td>
    <?php } ?>
    <td><?php echo $cikti["satinalma_Siparistarih"];?></td>
<?php if($_SESSION['yetki']=='onay'){ ?>
    <td><a href="satinalmataleplersil.php?id=<?php echo $cikti["satinalma_ID"];?>">Sil</td>
    </tr>
    <?php } else { ?>
	<td>Yetki Yok</td>
		<?php
}	} } ?>
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
      
      </div>
  </body>

 
</html>