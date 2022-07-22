<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display PDF</title>
    <style media="screen">
      embed{
        border: 2px solid black;
        margin-top: 30px;
      }
      .div1{
        margin-left: 170px;
      }
    </style>
  </head>
  <body>
    <div class="div1">
      <?php
      include 'db.php';
      $id=$_GET['id'];
      $sql="SELECT satinalma_pdf from satinalma WHERE satinalma_ID = '$id'";
      $query=mysqli_query($conn,$sql);
      while ($info=mysqli_fetch_array($query)) { if(empty($info['satinalma_pdf'])){
        echo 'Pdf yok'; } else {
        ?>
      <embed type="application/pdf" src="satinalma_pdf/<?php echo $info['satinalma_pdf'] ; ?>" width="900" height="500">
    <?php
      
    } }
      ?>

    </div>

  </body>
</html>