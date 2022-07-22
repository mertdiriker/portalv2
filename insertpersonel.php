<?php
    
    require_once("databasebaglanti.php");
   

  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['personelad']) || (empty($_POST['personelsoyad']) || (empty($_POST['personelmail']) || (empty($_POST['personeltel']) || (empty($_POST['personelfirma']))))))
        {
            echo ' Boşları doldur ';
        }
        else
        {
            
            $personelad = $_POST['personelad'];
            $personelsoyad = $_POST['personelsoyad'];
            $personelmail = $_POST['personelmail'];
            $personeltel = $_POST['personeltel'];
            $personelfirma = $_POST['personelfirma'];
            $personelsifre = $_POST['personelsifre'];
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];
           
           
            
         

            

            $query = " insert into personel (Personel_Ad,Personel_Ekleyen,Personel_Eklemetarih,Personel_Soyad,Personel_Mail,Personel_Tel,Personel_Firma,Personel_Sifre) values('$personelad','$ekleyen','$tarih','$personelsoyad','$personelmail','$personeltel','$personelfirma','$personelsifre')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:personel.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        header("location:personel.php");
    }



?>