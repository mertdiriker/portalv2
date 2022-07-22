<?php
    
    require_once("databasebaglanti.php");
   

  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['siparisno']) || (empty($_POST['siparisurun']) || (empty($_POST['siparisfirma']) || (empty($_POST['siparismiktar']) || (empty($_POST['siparissevk']) || (empty($_POST['siparisfiyat']) || (empty($_POST['siparisfiyat'])|| (empty($_POST['siparistarih'])|| (empty($_POST['siparisteslimtarih']))))))))))
        {
            echo ' Boşları doldur ';
        }
        else
        {
            
            $siparisno = $_POST['siparisno'];
            $siparisnot = $_POST['siparisnot'];
            $siparissevk = $_POST['siparissevk'];
            $siparisurun = $_POST['siparisurun'];
            $siparisfirma = $_POST['siparisfirma'];
            $siparismiktar = $_POST['siparismiktar'];
            $siparisfiyat = $_POST['siparisfiyat'];
            $siparistarih = $_POST['siparistarih'];
            $siparisteslimtarih = $_POST['siparisteslimtarih'];
            $ekleyen = $_SESSION['id'];
           
           
            
         

            

            $query = " insert into siparis (Siparis_No,Siparis_Not,Siparis_Sevk,Siparis_Urun,Siparis_Firma,Siparis_Miktar,Siparis_Fiyat,Siparis_Teslimtarihi,Siparis_Ekleyen,Siparis_Eklemetarih) values('$siparisno','$siparisnot','$siparissevk','$siparisurun','$siparisfirma','$siparismiktar','$siparisfiyat','$siparisteslimtarih','$ekleyen','$siparistarih')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:siparis.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        header("location:siparis.php");
    }



?>