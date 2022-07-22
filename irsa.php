<?php
include 'databasebaglanti.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style2.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
    <?php
    include "nav.php";
    ?>
		</nav>
   

<?php

    $query = "SELECT * FROM firma ORDER BY firma_ad";
    $result = $con->query($query);

    ?>
    

		<div class="content" style="overflow-x:auto;">
			  <div style="overflow-x:auto;">
          <h3 style="background:rgb(57, 85, 136);
          color:#fff;
          padding-top:20px;
          padding-bottom:20px;">&emsp;İRSALİYE GİRİŞ EKRANI</h3>	
				</div>
        <div>
          <form action="irsagiris.php" method="post" >
            <div style="background:rgb(57, 85, 136);
          color:#fff;
          padding-left:85px;
          padding-top:20px;"
          >
          
          <label for="email">&emsp;Tedarikçi :</label><select name="tedarikci" id="tedarikci" class="form-control" style="width:600px;"onchange="DivChange(this.value)"  required>
            <option value="">&emsp;Firma Seç</option>
               <?php
                   if ($result->num_rows > 0 ) {
                       while ($row = $result->fetch_assoc()) {
                           echo '<option value="'.$row['Firma_Ad'].'">'.$row['Firma_Ad'].'</option>';
                         }
                       }
               ?> 
          </select>
          <br>
          </div>
          
     <div style="background:rgb(57, 85, 136);
                    color:#fff;
                    padding-top:20px;
                    padding-bottom:20px;" >   
            <label >&emsp;İrsaliye No: </label>      <input type="text"  placeholder=" IrsNo " name="irsno"  value= ""> &emsp;
            
            <label >&emsp;İrsaliye Tarih : </label>      <input type="date"   name="irstarih"  value= ""> &emsp;
            
            
    
            
            
    </div>  
    
                 <br>
    <input type="text" placeholder="Kalem Sayısı" name="kalem" id="kalem" onchange="Kalem(this.value)" required>
    <div id="kalems">
            
            </div> 
    
          <br>
       
            
      
       
       
          </div>
          <button id="submit" style="display: inline-block;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    text-align: center;
    padding-top: 6px;
    background: rgb(57, 85, 136);
    margin-right: 10px;
    position: relative;
    cursor: pointer;
    font-weight: 600;
    width:100px;
    margin-bottom: 20px;">Ekle</button>
          </form>
          </div>
        <script type="text/javascript">
  function DivChange(id){
    $.ajax({
      type:'post',
      url: 'stok.php',
      data : { firmaid : id},
      success : function(data){
         $('#stok').html(data);
      }

    })
  }

  

    
    </script>
    <script type="text/javascript">
  function DivChange2(id,i){
    $.ajax({
      type:'post',
      url: 'stokurun.php',
      data : { urunid : id, i : i},
      success : function(data){
         $('#urun'+i).html(data);
      }

    })
  }

  

    
    </script>
      <script type="text/javascript">
  function LotChange(id,i){
    $.ajax({
      type:'post',
      url: 'lot.php',
      data : { miktarid : id,i : i},
      success : function(data){
         $('#lot'+i).html(data);
      }

    })
  }

  

    
    </script>
        <script type="text/javascript">
  function Kalem(id){
    $.ajax({
      type:'post',
      url: 'kalem.php',
      data : { kalem : id},
      success : function(data){
         $('#kalems').html(data);
      }

    })
  }

  

    
    </script>
	</body>
</html>