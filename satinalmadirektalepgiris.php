<?php
    
    include "databasebaglanti.php";
   

  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['urun']) || empty($_POST['aciklama']))
        {
            echo ' Boşları doldur ';
        }
        else
        {
            $urunid = $_POST['urun'];

            $stmt = $con->prepare('SELECT * FROM urunler WHERE Urunler_ID = ?');
            // In this case we can use the account ID to get the account info.
            $stmt->bind_param('s', $urunid);	
            $stmt->execute();
            $sonuc = $stmt->get_result();
            $stmt->fetch();
           
            $cikti = $sonuc->fetch_array();
            $stmt->close();
            $satinalmakod=$cikti['Urunler_Kod'];
            $urunad=$cikti['Urunler_Ad'];
			$istenentarih=$_POST['istenentarih'];
            $birim=$_POST['birim'];
            $aciklama = $_POST['aciklama'];
            $adet = $_POST['adet'];
           
            $firma=$_POST['firma'];
            $tedarikciid=$_POST['tedarikci'];
            $fiyat=$_POST['yenifiyat'];
			$termin=$_POST['termin1'];
			$durum='Onay Bekleniyor';

           

            date_default_timezone_set('Europe/Istanbul');
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];
			$stmt = $con->prepare('SELECT * FROM tedarikci WHERE Tedarikci_ID = ?');
            // In this case we can use the account ID to get the account info.
            $stmt->bind_param('s', $tedarikciid);	
            $stmt->execute();
            $sonuc = $stmt->get_result();
            $stmt->fetch();
           
            $cikti = $sonuc->fetch_array();
            $stmt->close();
			$tedarikci=$cikti['Tedarikci_Ad'];
            
           
           
            
         

            

            $query = " insert into satinalma (satinalma_Urun,satinalma_Adet,satinalma_Aciklama,satinalma_Talepci,satinalma_Taleptarih,satinalma_Talepbirim,satinalma_Firma,satinalma_Kod,satinalma_Teklif1firma,satinalma_Teklif1fiyat,satinalma_Termin1,satinalma_Durum,satinalma_Istenentarih) values('$urunad','$adet','$aciklama','$ekleyen','$tarih','$birim','$firma','$satinalmakod','$tedarikci','$fiyat','$termin','$durum','$istenentarih')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:satinalmatalepler.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        echo "hata";
    }



?>