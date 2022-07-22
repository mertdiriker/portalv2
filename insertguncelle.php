<?php
    
    require_once("databasebaglanti.php");


  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['urunkod']) || empty($_POST['urunolcut']) || empty($_POST['urunad']))
        {
            echo ' Boşları doldur ';
        }
        else
        {
         
            $Urunkod = $_POST['urunkod'];
            $Urunolcut = $_POST['urunolcut'];
            $Urunad=$_POST['urunad'];
            $tedarikci=$_POST['tedarikci'];
            $sonfiyat=$_POST['sonfiyat'];
            date_default_timezone_set('Europe/Istanbul');
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];
            $sonfiyattur = $_POST['sonfiyattur'];

            

            $query = " insert into urunler (Urunler_Kod,Urunler_Olcut,Urunler_Ad,Urunler_Ekleyen,Urunler_Eklenmetarih,Urunler_Tedarikci,Urunler_Sonfiyat,Urunler_Sonfiyattur) values('$Urunkod','$Urunolcut','$Urunad','$ekleyen','$tarih','$tedarikci','$sonfiyat','$sonfiyattur')";
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