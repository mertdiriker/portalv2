<?php
    
    require_once("databasebaglanti.php");
   

  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['firmaad']))
        {
            echo ' Boşları doldur ';
        }
        else
        {
            
            $firmaad = $_POST['firmaad'];
            $firmayetkili = $_POST['firmayetkili'];
            $firmatel=$_POST['firmatel'];
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];
           
           
            
         

            

            $query = " insert into firma (Firma_Ad,Firma_Ekleyen,Firma_Eklemetarih,Firma_Yetkili,Firma_Tel) values('$firmaad','$ekleyen','$tarih','$firmayetkili','$firmatel')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:firma.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        header("location:firma.php");
    }



?>