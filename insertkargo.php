<?php
    
    require_once("databasebaglanti.php");



  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['urun']) || empty($_POST['kargotur']) || empty($_POST['kargofirma']) || empty($_POST['kargotarih']) || empty($_POST['kargotarih']))
        {
            echo ' Boşları doldur ';
        }
        else
        {

            $urun = $_POST['urun'];
            $kargotur = $_POST['kargotur'];
            $kargotarih = $_POST['kargotarih'];
            $kargokisi=$_POST['kargokisi'];
            $kargofirma=$_POST['kargofirma'];

      
         
            
          
            date_default_timezone_set('Europe/Istanbul');
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];

            

            $query = " insert into kargo (kargo_Urun, kargo_Tur,kargo_Tarih,kargo_Kisi,kargo_Firma,kargo_Ekleyen,kargo_Eklemetarih) values('$urun','$kargotur','$kargotarih','$kargokisi','$kargofirma','$ekleyen','$tarih')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:kargotakip.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        header("location:kargotakip.php");
    }



?>