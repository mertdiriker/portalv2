<?php
    
    require_once("databasebaglanti.php");
   

  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['tedarikci']))
        {
            echo ' Boşları doldur ';
        }
        else
        {
            
            $tedarikciad = $_POST['tedarikci'];
     
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];
           
           
            
         

            

            $query = " insert into tedarikci (Tedarikci_Ad,Tedarikci_Ekleyen,Tedarikci_Eklemetarih) values('$tedarikciad','$ekleyen','$tarih')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:satinalmaguncelle.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        header("location:satinalmaguncelle.php");
    }



?>