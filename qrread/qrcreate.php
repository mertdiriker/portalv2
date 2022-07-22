<?php
    
    require_once("../databasebaglanti.php");
    include "../phpqrcode/qrlib.php";


  
            

    if(isset($_POST['submit']))
    {
        if(empty($_POST['info']) )
        {
            echo ' Boşları doldur ';
        }
        else
        {
            $folderTemp = 'qrs/' ;
            $info = $_POST['info'] ;
            $c = $info ;
            $d = $info.".png";
            $qual='H';
            $padding = 0;
            $ukuran = 6 ;
            QRCode :: png ($c,$folderTemp.$d,$qual,$ukuran,$padding);
           
            

            $query = " insert into qrinfo (qrinfo_info,qrinfo_dizin) values('$info','$d')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:qrs.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        
        header("location:qrread/");
    }



?>