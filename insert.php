<?php
    
    require_once("databasebaglanti.php");
    include "phpqrcode/qrlib.php";


  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['urunkod']) || empty($_POST['urunolcut'] || empty($_POST['urunad'] || empty($_POST['urunfirma']))))
        {
            echo ' Boşları doldur ';
        }
        else
        {
            $folderTemp = 'qrcodeimages/' ;
            $Urunkod = $_POST['urunkod'];
            $Urunfirma = $_POST['urunfirma'];
            $Urunolcut = $_POST['urunolcut'];
            $Urunad=$_POST['urunad'];
            $c = $Urunkod ;
            $d = $Urunkod.".png";
            $qual='H';
            $padding = 0;
            $ukuran = 6 ;
            QRCode :: png ($c,$folderTemp.$d,$qual,$ukuran,$padding);
            date_default_timezone_set('Europe/Istanbul');
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];

            

            $query = " insert into urunler (Urunler_Kod, Urunler_Firma,Urunler_Olcut,Urunler_Ad,Urunler_QR,Urunler_Ekleyen,Urunler_Eklenmetarih) values('$Urunkod','$Urunfirma','$Urunolcut','$Urunad','$d','$ekleyen','$tarih')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:test.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        header("location:test.php");
    }



?>