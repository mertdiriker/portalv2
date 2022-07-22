<?php
    
    require_once("databasebaglanti.php");
    

      $kalem=$_POST['kalem'];
      


  
        if(empty($_POST['urunad1']) || empty($_POST['urunolcut1'] || empty($_POST['urunfirma'] || empty($_POST['irsno']))))
        {
            echo ' Boşları doldur ';
        }
        else
        {

            for ($j = 1; $j <= $kalem; $j++){

                $miktar=$_POST['miktar'.$j];

            for ($i = 1; $i <= $miktar; $i++) {
            $stokkod=$_POST['urunkod'.$j];
            $stokolcutur = $_POST['urunolcuttur'.$j];
            $stokurunid = $_POST['urunad'.$j];
            $stokmiktar = $_POST['urunolcut'.$j];
            $stokfirma = $_POST['firma'.$j];
            $stoktedarikci = $_POST['tedarikci'];
            $stokirsno = $_POST['irsno'];
            $stokirstarih = $_POST['irstarih'];
            $stokurttarih = $_POST['irsurttarih'.$j.$i];
            $stoklotn = $_POST['lotnm'.$j.$i];
            $stoklokasyon= $_POST['lokasyon'.$j];
        
            date_default_timezone_set('Europe/Istanbul');
            $tarih = date('d-m-Y H:i:s',time());
            $ekleyen = $_SESSION['id'];

            

            $query = " insert into stok (stok_urunid,stok_miktar,stok_firmaid,stok_irsaliyeno,stok_irsaliyetarihi,stok_uretimtarihi,stok_lotnumarasi,stok_lokasyonid,stok_eklemetarih,stok_ekliyen,stok_tedarikci,stok_olcutturu,stok_urunkod) 
            values('$stokurunid','$stokmiktar','$stokfirma','$stokirsno','$stokirstarih','$stokurttarih','$stoklotn','$stoklokasyon','$tarih','$ekleyen','$stoktedarikci','$stokolcutur','$stokkod')";
            $result = mysqli_query($con,$query);

            }
        }

            if($result)
            {
                header("location:irsa.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        
    }




?>