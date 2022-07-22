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
				$query="CREATE table hammadd (".rtrim($q,",").");";
			}else{
				$query="INSERT INTO hammadd (hammadde_Ad,hammadde_Kod,hammadde_En,hammadde_Boy) values (".rtrim($q,",").");";
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

        <?php

    $query = "SELECT * FROM firma ORDER BY firma_ad";
    $result = $con->query($query);

    ?>
    

		<div class="content" style="overflow-x:auto;
    width:1500px;">
			  <div style="overflow-x:auto;">
          <h3 style="background:rgb(57, 85, 136);
          color:#fff;
          padding-top:20px;
          padding-bottom:20px;">&emsp;TEKLİF</h3>	

        <div>
          <form action="teklifgiris.php" >
            <div style="background:rgb(57, 85, 136);
          color:#fff;
          padding-left:85px;
          padding-top:20px;"
          >
          
          <label for="email">&emsp;Müşteri :</label><select name="musteri" id="musteri" class="form-control" style="width:600px;"onchange="DivChange(this.value)"  required>
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
          <div name="urun" id="urun">

          </div>
          <div id="sayi">

          </div>
          <div id="hammaddeler">

          </div>
          <div id="malzemeler">

          </div>
          <br>
          <br>
          <button type="submit">Ekle</button>
        </form>

        <script type="text/javascript">
  function DivChange(id){
    $.ajax({
      type:'post',
      url: 'teklifurun.php',
      data : { urunid : id},
      success : function(data){
         $('#urun').html(data);
      }

    })
  }

  

    
    </script>
      <script type="text/javascript">
  function UrunChange(id){
    $.ajax({
      type:'post',
      url: 'teklifhamsayi.php',
      data : { urunid : id},
      success : function(data){
         $('#sayi').html(data);
      }

    })
  }

  

    
    </script>
    </script>
      <script type="text/javascript">
  function HammaddeSayiChange(id){
    $.ajax({
      type:'post',
      url: 'teklifhammaddesec.php',
      data : { urunid : id},
      success : function(data){
         $('#hammaddeler').html(data);
      }

    })
  }

  

    
    </script>
    </script>
      <script type="text/javascript">
  function HammaddeChange(id,i){
    $.ajax({
      type:'post',
      url: 'teklifhammadde.php',
      data : { urunid : id, i : i},
      success : function(data){
         $('#recete' + i).html(data);
      }

    })
  }

  

    
    </script>
    <script type="text/javascript">
    function post(i){
        $.ajax({
            type:'POST',
            url:'teklifislem.php',
            data:$('#receteolcut' + i).serialize(),
            success:function(cevap){
                $("#sonuc" + i).html(cevap)
            }
        })
    }

    </script>
     </script>
      <script type="text/javascript">
  function FiiliChange(id,i,moq,saf){
    $.ajax({
      type:'post',
      url: 'tekliffiili.php',
      data : { fiili : id, i : i,moq : moq,saf : saf},
      success : function(data){
         $('#hata' + i).html(data);
      }

    })
  }

  

    
    </script>
       <script type="text/javascript">
  function KagitChange(id){
    $.ajax({
      type:'post',
      url: 'teklifkagit.php',
      data : { kagit : id},
      success : function(data){
         $('#kagit').html(data);
      }

    })
  }

  

    
    </script>
         <script type="text/javascript">
  function AmbalajChange(id){
    $.ajax({
      type:'post',
      url: 'teklifambalaj.php',
      data : { ambalaj : id},
      success : function(data){
         $('#ambalaj').html(data);
      }

    })
  }

  

    
    </script>
          <script type="text/javascript">
  function KalıpChange(id){
    $.ajax({
      type:'post',
      url: 'teklifkalip.php',
      data : { kalip : id},
      success : function(data){
         $('#kalip').html(data);
      }

    })
  }

  

    
    </script>
         <script type="text/javascript">
  function ProcessSayiChange(id){
    $.ajax({
      type:'post',
      url: 'teklifprocess.php',
      data : { processsayi : id},
      success : function(data){
         $('#process').html(data);
      }

    })
  }

  

    
    </script>
         <script type="text/javascript">
  function DigerChange(id,i,moq,saf){
    $.ajax({
      type:'post',
      url: 'tekliffiili.php',
      data : { fiili : id, i : i,moq : moq,saf : saf},
      success : function(data){
         $('#hata' + i).html(data);
      }

    })
  }

  

    
    </script>
      <script type="text/javascript">
    function postkagit(){
        $.ajax({
            type:'POST',
            url:'teklifkagitislem.php',
            data:$('#kagitolcut').serialize(),
            success:function(cevap){
                $("#kagitsonuc").html(cevap)
            }
        })
    }

    </script>
    <script type="text/javascript">
    function postambalaj(){
        $.ajax({
            type:'POST',
            url:'teklifambalajislem.php',
            data:$('#ambalajolcut').serialize(),
            success:function(cevap){
                $("#ambalajsonuc").html(cevap)
            }
        })
    }

    </script>
     <script type="text/javascript">
    function postkalip(){
        $.ajax({
            type:'POST',
            url:'teklifkalipislem.php',
            data:$('#kalipolcut').serialize(),
            success:function(cevap){
                $("#kalipsonuc").html(cevap)
            }
        })
    }

    </script>
     <script type="text/javascript">
    function postprocess(){
        $.ajax({
            type:'POST',
            url:'teklifprocessislem.php',
            data:$('#processolcut').serialize(),
            success:function(cevap){
                $("#processsonuc").html(cevap)
            }
        })
    }

    </script>
	