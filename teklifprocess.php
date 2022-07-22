<?php
$processsayi=$_POST['processsayi'];
include 'databasebaglanti.php';
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

 
  </head>
  <body>
  <div class="container">
       <div class="row">
           <div class="col-lg-12">
           <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
           <tr style="background:rgb(57, 85, 136);
                        color:white;">
							<td style="color:white;">Process </td>
							<td style="width:50px;">Setup Süresi</td>
                            <td>Process Süresi</td>
                            <td>Process Adam Sayısı</td>
                            <td>Setup Adam Sayısı</td>
                            <td>Makina</td>
                            <td>Toplam Süre</td>
						</tr>
                        <form action="form-group" id="processolcut">
                        <input type="text" name = "processsayisi" style="display:none;" id="processsayisi" value="<?php echo $processsayi;?>">
                        </form>
                        <?php
                        for ($i = 1; $i <= $processsayi; $i++) {

                        
                            $stmt = $con->prepare('SELECT * FROM hammadd');
                            // In this case we can use the account ID to get the account info.
                        
                            $stmt->execute();
                            $sonuc = $stmt->get_result();
                        
                            $stmt->close();
                            $cikti = $sonuc->fetch_array();
    ?>
    <tr>
        <td><select name="process<?php echo $i;?>" id="process<?php echo $i;?>" onchange="postprocess()">
    <option value="">Process Seç</option>
    <?php
 while ($cikti = $sonuc->fetch_array())
{ ?>   

    <option value="<?php echo $cikti['hammadde_Ad'];?>"><?php echo $cikti['hammadde_Ad'];?></option>
    <?php } ?>
</select></td>
        <td><input type="text" style="width:60px;" placeholder="Setup Süresi" name="setupsure<?php echo $i;?>" onchange="postprocess()"></td>
        <td><input type="text" style="width:60px;" placeholder="Process Süresi" name="processsure<?php echo $i;?>" onchange="postprocess()"></td>
        <td><input type="text" style="width:60px;" placeholder="Process Adam" name="processadam<?php echo $i;?>" onchange="postprocess()"></td>
        <td><input type="text" style="width:60px;" placeholder="Setup Adam" name="setupadam<?php echo $i;?>" onchange="postprocess()"></td>
        <td>
<?php

$stmt = $con->prepare('SELECT * FROM hammadd');
// In this case we can use the account ID to get the account info.

$stmt->execute();
$sonuc = $stmt->get_result();

$stmt->close();
$cikti = $sonuc->fetch_array();
?>
<select name="makina<?php echo $i;?>" id="makina<?php echo $i;?>" onchange="postprocess()">
    <option value="">Makina Seç</option>
    <?php
 while ($cikti = $sonuc->fetch_array())
{ ?>   

    <option value="<?php echo $cikti['hammadde_Ad'];?>"><?php echo $cikti['hammadde_Ad'];?></option>
    <?php } ?>
</select>


        </td>
        <td><input type="text" style="width:60px;" placeholder="Toplam Süre" onchange="postprocess()" name="toplamsure<?php echo $i;?>"></td>
    </tr>
                       
                    <?php }  ?>
                </table>
            
             
                <div id="processsonuc">

                </div>
                        
                            
                        </body>