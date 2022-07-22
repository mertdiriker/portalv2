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
            $urunad = $_POST['urun'];

            $stmt = $con->prepare('SELECT * FROM urunler WHERE Urunler_Ad = ?');
            // In this case we can use the account ID to get the account info.
            $stmt->bind_param('s', $urunad);	
            $stmt->execute();
            $sonuc = $stmt->get_result();
            $stmt->fetch();
            $stmt->close();
            $cikti = $sonuc->fetch_array();
            $satinalmakod=$cikti['Urunler_Kod'];
			
			$istenentarih=$_POST['istenentarih'];
            $birim=$_POST['birim'];
            $aciklama = $_POST['aciklama'];
            $adet = $_POST['adet'];
            $pdf=$_FILES['pdf']['name'];
            $pdf_type=$_FILES['pdf']['type'];
            $pdf_size=$_FILES['pdf']['size'];
            $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
            $pdf_store="satinalma_pdf/".$pdf;
            $firma=$_POST['firma'];

            move_uploaded_file($pdf_tem_loc,$pdf_store);

            date_default_timezone_set('Europe/Istanbul');
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];
            
           
           
            
         

            

            $query = " insert into satinalma (satinalma_Urun,satinalma_Adet,satinalma_Aciklama,satinalma_Talepci,satinalma_Taleptarih,satinalma_pdf,satinalma_Talepbirim,satinalma_Firma,satinalma_Kod,satinalma_Istenentarih) values('$urunad','$adet','$aciklama','$ekleyen','$tarih','$pdf','$birim','$firma','$satinalmakod','$istenentarih')";
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