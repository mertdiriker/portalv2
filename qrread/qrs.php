<?php

include '../databasebaglanti.php';


$stmt = $con->prepare('SELECT * FROM qrinfo');
// In this case we can use the account ID to get the account info.
$stmt->execute();
$sonuc = $stmt->get_result();
$stmt->fetch();
$stmt->close();
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style2.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<nav class="navtop" style="overflow-x:auto;">
			<div>
				<h1> <img src="../portal.png"></h1>
				<a href="qrinfo.php">QR Oluştur</a>
                <a href="qrs.php">QR ları Gör</a>
                <a href="default.php">QR Okut</a>
			</div>
		</nav>
    <body>
<div class="container">
    
    <div class="main-body">
    
        
    <?php 
					while ($cikti = $sonuc->fetch_array())
					{if ($cikti["qrinfo_Silindi"]==FALSE){?>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="qrs/<?php echo $cikti["qrinfo_dizin"];?>" >
                    <div class="mt-3">
                      <h4><?php echo $cikti["qrinfo_ID"];?></h4>
                     
          
        
                    </div>
                  </div>
                </div>  
              </div>
            </div>
        
        </div>
    
    <?php } } ?>
    
    </div>
        
           

<style type="text/css">
body{
  
		background-image:url(../bg.png);
		background-size:cover;
		background-attachment: fixed;
	
    color: #1a202c;
    text-align: left;
    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>

